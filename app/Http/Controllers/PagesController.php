<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Post;
use Mail;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.index')->with('posts', $posts);

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
    public function getcontact(){
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
