<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Display the about page
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Display the contact page
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
