<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    //Show  Register page
    public function register(){
        return view('register');
    }

    //Register -Store a user 
    public function store(Request $request){
        $formfields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=> 'required|confirmed|min:6'
            
        ]);
        
        //Hash password
        $formfields['password']=bcrypt($formfields['password']);

        //Create user
        $user = User::create($formfields);

        //Log in 
        auth()->login($user);
        return redirect('/posts');
    }

    //Show Login page
    public function login(){
        return view('login');
    }

    //User Log in
    public function authenticate(Request $request){
        $formfields=$request->validate([
  
            'email'=>['required','email'],
            'password'=> 'required'
        ]);

        if(auth()->attempt($formfields)){
            $request->session()->regenerate();

            return redirect('/posts');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }

    //User log out
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
