<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class pagesController extends Controller
{
    public function about (){
        $data = [
            'Developer' => 'Marwa Mahmoud',
            'Phone' => '01000402218',
            'Contact us' => 'marwa.m.ebrahim@gmail.com'
        ];
        $title = 'about';
        return view('pages.about',compact('data','title'));
    }

    public function Profile (){

        $user = auth()->user();
        $posts = $user->posts;
        return view('home',compact('posts'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (auth()->user()->id !== $user->id) {
            return redirect('/profile')->with('error', 'you are not authorised');
        }
        return view('pages.editProfile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        $user = User::find($id);
        $user-> name = $request->name;
        $user-> email = $request->email;
        $user->save();

        return redirect('profile')->with('status', 'profile updated successfully');
    }

    public function changePassword ($id)
    {
        $user = User::find($id);

        if (auth()->user()->id !== $user->id) {
            return redirect('/login');
        }
        return view('pages.changePassword');
}

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'Password' => 'required|min:8|confirmed'
        ]);

        $user = User::find($id);
        $pass = Hash::make($request->password);

        if ($user->password == $pass){
            $user->password = $pass;
            $user->save();
            return redirect('profile')->with('status', 'password updated successfully');
        }

        else {
            return redirect('profile')->with('status', 'password is not correct');
        }
    }
}
