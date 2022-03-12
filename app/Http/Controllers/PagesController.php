<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        $posts = Post::latest()->paginate(4);
        $cats = Category::orderBy('name', 'ASC')->get();
        $recentPosts = Post::latest()->take(3)->get();
        $seoKeys = $cats->pluck('name');
        $keywords = '';

        foreach ($seoKeys as $key) {
            $keywords .= $key . ($key == $seoKeys->last() ? '' : ',');
        }

        $data = [
            'posts' => $posts,
            'categories' => $cats,
            'recentPosts' => $recentPosts,
            'keywords' => $keywords,
        ];

        return view('pages.home')->with($data);
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
