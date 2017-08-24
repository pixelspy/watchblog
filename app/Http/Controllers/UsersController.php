<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use Image;
use App\Category;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $categories = Category::all();

        return view('users.show')->with('user', $user)->with('categories', $categories);
    }

    public function showPosts() {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('dashboard')->with('posts', $user->posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->can('update', $user)) {
            return view('users.edit')->with('user', $user);
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->can('update', $user)) {
            // Handle the user upload of avatar
            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename));

                $user->avatar = $filename;
                $user->save();
            } else {
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required',
                ]);

                $user->name = $request->input('name');
                $user->email = $request->input('email');

                $user->save();
            }
            return redirect()->back()->with('success', 'Profile updated');

        } else {
            return redirect('/');
        }

    }
    
/*
    public function updateAvatar(Request $request, User $user)
    {
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('users.profile', array('user' => Auth::user()));

    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
