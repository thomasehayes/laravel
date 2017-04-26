<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    public function index()
    {
        $posts = \App\Models\Post::all();
        $data = [];
        $data['posts'] = $posts;
        return view('posts.index', $data);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $posts = new \App\Models\Post;
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->url = $request->url;
        $posts->created_by = 14;
        $posts->save();

        return redirect()->action('PostsController@index');
    }

    public function show($id)
    {
        $post = \App\Models\Post::find($id);
        return view('posts.show', ['post'=>$post]);    
    }

    public function edit($id)
    {   
        $post = \App\Models\Post::find($id);
        return view('posts.edit', ['post'=>$post]);   
    }

    public function update(Request $request, $id)
    {
            
    }

    public function destroy($id)
    {
        $post = \App\Models\Post::find($id);
        $post->delete();
        return redirect()->action('PostsController@index');
    }
}
