<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->get();
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => 'string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:24'
        ]);

        // dd($request->image_path);
        // $image_name = time().'.'.$request->image_path->extension();
        // $request->file('image_path')->move(public_path(''), $request->image_path);
        
        $image_file = $request->file('image_path');
        $image_name = $image_file->getClientOriginalName();

        // $image_file->move(base_path('images'), $image_name);

        Storage::disk('public')->putFileAs('', $image_file, $image_name);
        
        
        // $request->image_path->move(public_path(), $request->image_path);

        // $image = $request->file();

        $post_data['title'] = $request->title;
        $post_data['description'] = $request->description;
        $post_data['image_path'] = $image_name;
        $post_data['user_id'] = 1;

        $new_post = Post::create($post_data);

        return to_route('posts.index', $new_post)->with('message', 'Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
