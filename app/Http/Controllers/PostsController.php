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
        return 'Show the form to create a post';
    }

    public function store(Request $request)
    {
        return 'Save the new post';    
    }

    public function show($id)
    {
        return 'Show a specific post by id';    
    }

    public function edit($id)
    {
        return 'Show the form to edit a post';    
    }

    public function update(Request $request, $id)
    {
        return 'Update the post in the database';    
    }

    public function destroy($id)
    {
        return 'Delete a post';    
    }
}
