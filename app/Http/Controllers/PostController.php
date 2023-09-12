<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class PostController extends Controller
{
    //Show all posts
    public function index(){
        return view('posts',[
            'posts'=>Posts::latest()->filter(request(['search']))->simplepaginate(10)
        ]);
    }


    //Show single post
    public function show(Posts $post){
        return view('post',[
            'post'=>$post
        ]);
    }
    

    //Show Create a post
    public function create(){
        return view('create');
    }


    //Store a post
    public function store(Request $request){
        $formfields=$request->validate([
            'source'=>'required',
            'destination'=>'required',
            'time'=>'required',
            'source'=>'required',
            'contact'=>'required',
            'date'=>'required'
        ]);

        //Add user_id
        $formfields['user_id']=auth()->id();

        Posts::create($formfields);
        return redirect('/posts');
    }


    //Show edit form
    public function edit(Posts $post){
        return view('edit',[
            'post'=>$post
        ]);
    }


    //Update edit form
    public function update(Request $request, Posts $post){

        //checking if authorized user

        if ($post->user_id!=auth()->id()){
            abort(403,'Unauthorized Action!');
        }
        $formfields=$request->validate([
            'source'=>'required',
            'destination'=>'required',
            'time'=>'required',
            'source'=>'required',
            'contact'=>'required',
            'date'=>'required'
        ]);
        $post->update($formfields);
        return redirect('/posts');
    }


    //Delete post
    public function destroy(Posts $post){

        //user authentication before deletion
        if ($post->user_id!=auth()->id()){
            abort(403,'Unauthorized Action!');
        }

        $post->delete();
        
        return redirect('/posts');
    }

    //Manage post
    public function manage(){
        return view('manage',['posts'=>auth()->user()->posts()->get()]);
    }

    
}
