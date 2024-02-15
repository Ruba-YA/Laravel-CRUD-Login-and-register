<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view ('posts.index', ['posts'=>Post::all()]);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
       $data =  request()->validate([
            'title'=>'required',
            'description'=>'required',
            'category_id'=>'required' , Rule::exists('categories' , 'id')
        ]);
        $data['user_id'] = auth()->user()->id;
        Post::create($data);
        return redirect('/posts/index')->with('success' , 'Post Created');
    }

    public function edit(Post $post)
    {
        return view('posts.edit' , ['post' =>$post]);
    }
    public function update(Post $post)
    {
        $data =  request()->validate([
            'title'=>'required',
            'description'=>'required',
            'category_id'=>'required' , Rule::exists('categories' , 'id')
        ]);

        $post->update($data);
        return redirect('/posts/index')->with('success' , 'Post Updated');

    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts/index')->with('success' , 'Post deleted');
    }
}
