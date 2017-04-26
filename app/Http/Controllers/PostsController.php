<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    public function index()
    {
        return 'A listing of all posts';
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        return back()->withInput();
    }

    public function show($id)
    {
        return 'Show a specific post by id';    
    }

    public function edit($id)
    {
        return view('posts.edit');   
    }

    public function update(Request $request, $id)
    {
            
    }

    public function destroy($id)
    {
        return "Deleted Post";
    }
}
