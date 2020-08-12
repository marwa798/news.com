<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
