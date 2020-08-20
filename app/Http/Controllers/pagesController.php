<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class pagesController extends Controller
{
    public function about()
    {
        $data = [
            'Developer' => 'Marwa Mahmoud',
            'Phone' => '01000402218',
            'Contact us' => 'marwa.m.ebrahim@gmail.com'
        ];
        $title = 'about';
        return view('pages.about', compact('data', 'title'));
    }

    public function Profile()
    {

        $user = auth()->user();
        $posts = $user->posts;
        return view('home', compact('posts'));
    }

    public function edit()
    {
        $user = auth()->user();

//        if (auth()->user()->id !== $user->id) {
//            return redirect('/profile')->with('error', 'you are not authorised');
//        }
        return view('pages.editProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('profile')->with('status', 'profile updated successfully');
    }

    public function changePassword()
    {

        return view('pages.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'Password' => 'required|min:8|confirmed'
        ]);

        $user = authApi()->user();
        $pass = Hash::make($request->get('old_password'));

        if ($user->password == $pass) {
            $user->password = Hash::make($request->get('password'));
            $user->save();
            return redirect('profile')->with('status', 'password updated successfully');
        } else {
            return redirect('profile')->with('status', 'password is not correct');
        }
    }
}
