<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function login_post(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = User::find($request->email);

        $user_email = $user->email;
        $user_password = $user->password;

        if($email == $user_email && $password == $user_password){
            return 'logged in';
        }
        return to_route('admin.login', $user_object)->with('message', 'Wrong credentials!');
    }

    //register get, post
    public function register(){
        return view('admin.register');
    }

    public function register_post(Request $request){
        $username = $request->name;
        $email = $request->email;
        $password = $request->password;


        //check if email exists
        $user = User::find($request->email);
        if($user){
            return to_route('admin.login', $user_object)->with('message', 'Already a user');
        }
        
        $user_object = [];
        $user_object['username'] = $username;
        $user_object['email'] = $email;
        $user_object['password'] = $password;

        $user_object = User::create($user_object);

        return to_route('admin.dashboard', $user_object)->with('message', 'Welcome' . $username);
    
        
    }

}
