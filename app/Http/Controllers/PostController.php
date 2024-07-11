<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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

        foreach($posts as $post){
            $user = User::find($post->user_id);
            $post->user = $user;
        }

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
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240' //10MB
        ]);
        
        $image_file = $request->file('image_path');
        $image_name = $image_file->getClientOriginalName();

        Storage::disk('public')->putFileAs('', $image_file, $image_name);
        

        $post_data['title'] = $request->title;
        $post_data['description'] = $request->description;
        $post_data['image_path'] = $image_name;
        $post_data['user_id'] = 1;

        $new_post = Post::create($post_data);

        //todo message if validation is not successful
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
        return view('post.edit', ['post' => $post]);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => 'string',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:10240' //10MB
        ]);
        
        if($request->file('image_path')){
            $image_file = $request->file('image_path');
            $image_name = $image_file->getClientOriginalName();
    
            Storage::disk('public')->putFileAs('', $image_file, $image_name);
            $post_data['image_path'] = $image_name;
        }
        

        $post_data['title'] = $request->title;
        $post_data['description'] = $request->description;

        $post->update($post_data);

        //todo message if validation is not successful
        return to_route('posts.index', $post)->with('message', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
