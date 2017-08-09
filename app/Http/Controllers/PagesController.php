<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;


class PagesController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.index')->with('posts', $posts);

    }

    public function about(){
        $data = array(
            'title' => 'About this site',
            'categories' => ['web design', 'programming', 'culture']
        );
        return view('pages.about')-> with($data);
    }

}
