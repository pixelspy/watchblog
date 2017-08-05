<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Watch Blog';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);

    }

    public function about(){
        $data = array(
            'title' => 'About this site',
            'categories' => ['web design', 'programming', 'culture']
        );
        return view('pages.about')-> with($data);
    }

}
