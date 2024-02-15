<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {


        $posts = Post::with('category')->get();
        return view('posts',['posts'=> $posts ]);
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view ('post',['post'=>$post]);
    }
 public function search()
 {
    $post= Post::latest();
    if(request('search')){
        $post->where('title','like','%'.request('search').'%');
    }
    return view('posts',[
        'posts'=> $post->get()
    ]);
 }





}
