<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct() {
        $this->middleware('auth');
        // this locks down our CTR to be used only by Auth
    }*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display a view of all our categories
        // display a form to create categories

        $categories = Category::all();

        return view('categories.index')->withCategories($categories);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request : to validate the new category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // saves a new category in the DB, and redirects to Cat.INDEX
                $this->validate($request, array(
                    'name' => 'required|max:255 '
                ));

                //$user = User::findOrFail($user_id);

                $category = new Category;
                $category->name = $request->name;
                //$category->user()->associate($user);
                $category->user_id = auth()->user()->id;

                $category->save();

                return redirect()->route('categories.index')->with('success', 'Category created');

    }


    /**
     * Display the specified resource.

     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $category = DB::table('categories')->where($category, '=' $post->category_id)->get();
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        // Check for correct user, a user cannot edit a post that isn't there
        if(auth()->user()->id !==$category->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required']);

        $category = Category::find($id);
        $category->name = $request->input('name');

        $category->save();

        return redirect('/categories')->with('success', 'Category updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        // Check for correct user, a user cannot delete a post that isn't theres
        if(auth()->user()->id !==$category->user_id){
            return redirect('/categories')->with('error', 'Unauthorized Page');
        }

        $category->delete();
        return redirect('/categories')->with('success', 'Category removed');
    }
}
