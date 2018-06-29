<?php

namespace WatchBlog\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use WatchBlog\Http\Requests;
use WatchBlog\Post;
use WatchBlog\User;
use Mail;
use WatchBlog\Category;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();

        return view('pages.index')->with('posts', $posts)->with('categories', $categories);

    }
    /**
     * Show the application about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about(){
        $data = array(
            'title' => 'About this site',
            'categories' => ['web design', 'programming', 'culture']
        );
        return view('pages.about')-> with($data);
    }

    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContact(){
        return view('pages.contact');
    }
    
    /**
     * Show the form for creating a new contact.
     * @param  \Illuminate\Http\Request 
     * request to validate posted message
     * 
     * @return \Illuminate\Http\Response
     */
    public function postContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = array(
          'email' => $request->email,
           'subject' => $request->subject,
            'bodyMessage' => $request->message,
            'survey' => ['Q1' => "hello", 'Q2' => 'YES']
        );
        
        Mail::send('emails.contact', $data, function($message) use ($data){
            $message ->from($data['email']);
            $message->to('mahana.delacour@gmail.com');
            $message->subject($data['subject']);
        });

        return redirect('/')->with('success', 'Your email was sent!');

    }



}
