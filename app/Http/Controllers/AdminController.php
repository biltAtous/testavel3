<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    //dashboard
    public function dashboard(){
        return view('admin.dashboard');
    }
    

    //login get, post
    public function login(){
        return view('admin.login');
    }

    public function login_post(){
        return 'logged in';
    }

    //register get, post
    public function register(){
        return view('admin.register');
    }

    public function register_post(){
        return 'registered';
    }

}
