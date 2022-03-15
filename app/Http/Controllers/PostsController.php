<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'category', 'search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        $data = [
            'categories' => $categories,
        ];

        return view('dashboard.create_post')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request; //? test case

        $newPost = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'category' => 'required',
        ]);

        $post = new Post();
        $post->title = $newPost['title'];
        $post->body = $newPost['body'];
        $post->tags = $newPost['tags'];
        $post->user_id = auth()->user()->id;
        $post->category_id = $newPost['category'];
        $post->save();

        return redirect('/')->with('success', 'New post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $cats = Category::orderBy('name', 'ASC')->get();
        $postAuthor = $post->user->id;
        $recentPostsFromTheAuthor = Post::latest()->where('user_id', $postAuthor)->take(3)->get();

        $data = [
            'post' => $post,
            'categories' => $cats,
            'recentPostsFromTheAuthor' => $recentPostsFromTheAuthor,
        ];

        return view('pages.single_post')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id; //? test case

        $post = Post::find($id);
        $categories = Category::all()->pluck('name', 'id');

        $data = [
            'post' => $post,
            'categories' => $categories,
        ];

        return view('dashboard.edit_post')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request; //? test case

        $newValues = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'category' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $newValues['title'];
        $post->body = $newValues['body'];
        $post->tags = $newValues['tags'];
        $post->category_id = $newValues['category'];
        $post->save();

        return redirect('/')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id; //? test case

        $post = Post::find($id);
        $post->comments()->each(function ($item) {
            $item->replies()->delete();
        });
        $post->comments()->delete();
        $post->delete();

        return redirect('/')->with('success', 'Post deleted');
    }

    /**
     * Display all posts from a specified category
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        $category = Category::find($id);
        $posts = $category->posts()->latest()->paginate(4);
        $seoKeys = Category::orderBy('name', 'ASC')->get()->pluck('name');
        $keywords = '';

        foreach ($seoKeys as $key) {
            $keywords .= $key . ($key == $seoKeys->last() ? '' : ',');
        }

        $data = [
            'posts' => $posts,
            'keywords' => $keywords,
            'category' => $category,
        ];

        return view('pages.category')->with($data);
    }

    /**
     * Display search results for a specified term
     * 
     * @param string $term
     * @return \Illuminate\Http\Response
     */
    public function search($term)
    {
        $posts = Post::where('title', 'like', '%' . $term . '%')->latest()->paginate(3);
        $seoKeys = Category::orderBy('name', 'ASC')->get()->pluck('name');
        $keywords = '';

        foreach ($seoKeys as $key) {
            $keywords .= $key . ($key == $seoKeys->last() ? '' : ',');
        }

        $data = [
            'posts' => $posts,
            'keywords' => $keywords,
            'term' => $term,
        ];

        return view('pages.search')->with($data);
    }
}
