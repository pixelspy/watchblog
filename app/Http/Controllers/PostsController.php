<?php

namespace WatchBlog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use WatchBlog\Post;
use WatchBlog\Category;
use WatchBlog\Comment;
use WatchBlog\User;



class PostsController extends Controller
{
    /**
     * @resource PostsController instance
     * Create a new controller instance.
     * Creates an exception for index and show for non-users
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return the data from model Post:

        //$posts = Post::all();

        //$posts = Post::orderBy('title', 'desc')->get();
        //$posts = Post::orderBy('title', 'desc')->take(10)->get();
        // desc : to get the most recent posts first

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        // created_at and desc allows to get the 10 most recent blogposts first

        $categories = Category::all();


        return view('posts.index')->with('posts', $posts)->with('categories', $categories);
       // return view('pages.index')->with('posts', $posts);

        // return Post::where('title', 'Post Two')->get();
        // for a WHERE query
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request : to validate posted article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required|integer',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
          // nullable: so that image is NOT required, max at 1999 to fit in 2MG
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get a file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Create filename to store (unique filename)
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
//            ->storeAs('public/cover_images' will store the images in : /storage/app/public
//            $ php artisan storage:link  will create that private folder in the /public folder and link

        } else {
            $fileNameToStore = 'noimage.png';
//            this is the default img if no img was uploaded
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->category_id = $request->category_id;
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post created');
        // success related to our message file


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        // Check for correct user, a user cannot edit a post that isn't there
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post)->withCategories($cats);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * request to validate updated post
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' =>'required|integer',
            'body' => 'required'
        ]);
        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get a file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Create filename to store (unique filename)
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
//            ->storeAs('public/cover_images' will store the images in : /storage/app/public
//            $ php artisan storage:link  will create that private folder in the /public folder and link

        }

        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
            // if no images are updated, the same one remains
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post updated');
        // success relates to our message file
    }

   /* public function showPostsByCat()
    {
        $post = Post::all();
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        return view('posts.category')->with('post', $post)->withCategories($cats);
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Check for correct user, a user cannot delete a post that isn't theres
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
             // Delete the image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/dashboard')->with('success', 'Post removed');
    }
}
