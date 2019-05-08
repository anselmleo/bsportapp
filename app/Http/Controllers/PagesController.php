<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        $title = 'Welcome to BLOGSPORT!';
        return view('pages.index')->with('title', $title);
    }

    public function about()
    {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function sports() 
    {
        $title = 'Sports';
        return view('pages.sports')->with('title', $title);
    }
}
