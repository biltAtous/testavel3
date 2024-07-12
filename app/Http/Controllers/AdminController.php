<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class AdminController extends Controller
{
    
    //dashboard
    public function dashboard(Post $post){
        $user_id = Auth::user()->id;
        $posts = Post::query()->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', ['posts' => $posts] );
    }
    

    //login get, post
    public function login(){
        return view('admin.login');
    }

    public function login_post(Request $request){

        $validation = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

    
        $email = $request->email;
        $password = $request->password;
 
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) {
            return to_route('home')->with('message', 'Logged in successfully!');
        }

        return to_route('login', $user_object)->with('message', 'Wrong credentials!');

    }

    //register get, post
    public function register(){
        return view('admin.register');
    }

    public function register_post(Request $request){
        
        $request->validate([
            'name' => ['required', 'string'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:2',
        ]);
        

        $username = $request->name;
        $email = $request->email;
        $password = $request->password;

        //check if email exists
        $user = User::find($request->email);
        if($user){
            return to_route('login', $user_object)->with('message', 'Already a user');
        }
        
        $user_object = [];
        $user_object['name'] = $username;
        $user_object['email'] = $email;
        $user_object['password'] = $password;

        $user_object = User::create($user_object);

        return to_route('login', $user_object)->with('message', 'User created, please proceed to login!');
    
        
    }

    public function logout(Request $request){
        $data = array();

        if(Auth::user()->exists()){
            Auth::logout();
            
            return to_route('home')->with('message', 'Successfully logged out!');
        }
        return to_route('home')->with('message', 'Something went wrong');
        
    }

}
