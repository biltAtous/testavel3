<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function home(){
        $posts = Post::query()->orderBy('created_at', 'desc')->with('user')->get();
        return view('home', ['posts' => $posts]);
    }
}
