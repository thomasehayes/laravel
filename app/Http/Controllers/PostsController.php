<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Log;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>  ['index', 'show']]);
        // $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    // getting access to the request, is as easy as adding it as a parameter to any controller action
    public function index(Request $request) 
    {
        // dd($request->session()); // the session is now an object, not an associative array. 
        // we can get access to session through the request

        // $session = $request->session(); // session_start();
        // $session->clear(); // \Session::clear();
        
        // // Facade
        // \Session::clear(); // $session->clear(); // Laravel 4


        // // $session->put('greet', 'Hello World'); // $_SESSION['greet'] = 'Hello World'; //adding a key
        // $session->flash('greeting', 'Hello World'); // available only for the NEXT request
       
        if(isset($request->search)) {
            $posts = Post::select('posts.*')
                ->join('users', 'created_by', '=', 'users.id')
                ->where('title', 'like', "%$request->search%")
                ->orWhere('name', 'like', "%$request->search%")
                ->orderBy('posts.created_at', 'desc')
                ->paginate(4)->appends(['search' => $request->search]);
        } else {
            $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(4);
        }

        $data = [];
        $data['posts'] = $posts;
        return view('posts.index')->with($data);
    }

    public function create(Request $request)
    {

        // $session = $request->session();

        // $session->forget('greeting'); // unset($_SESSION['greet']); removing what specific arguments. 

        // $session->flush(); // unset($_SESSION); removing everything also looks like this // $_SESSION = [];

        // dd($request->session()->get('greet')); // dd($_SESSION['greet']);

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $rules = Post::$rules;
        $this->validate($request, $rules);


        $posts = new Post;
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->url = $request->url;
        $posts->created_by = \Auth::id();
        $posts->save();
    
        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$posts->id]);

    }

    public function show(Request $request, $id)
    {   
        // $session = $request->session();
        // dd(\Session::get('greeting')); // Laravel 4
        // dd($session->get('greeting')); // Laravel 5


        $post = Post::findOrFail($id);

        return view('posts.show', ['post'=>$post]);    
    }

    public function edit(Request $request, $id)
    {  
        $post = Post::find($id);
        
        if(!$post) {
            Log::info('Cannot edit post');
            $request->session()->flash('errorMessage', 'Post cannot be found');
            abort(404);
            // return redirect()->action('PostsController@index');
        }
        if(\Auth::id() != $post->created_by) {
            abort(403);
        } 

        return view('posts.edit', ['post'=>$post]);   
    }

    public function update(Request $request, $id)
    {
        $rules = Post::$rules;
        $this->validate($request, $rules);

        $post = Post::find($id);
        if(!$post) {
            Log::info('Cannot add post');
            $request->session()->flash('errorMessage', 'Post cannot be found');
            abort(404);
            // return redirect()->action('PostsController@index');
        }

        $post->title = $request->title;
        $post->url = $request->url;           
        $post->content = $request->content;
        $post->created_by = $request->id;
        $post->save();
        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$post->id]);

    }

    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post) {
            Log::info("Cannot delete post $id");
            $request->session()->flash('errorMessage', 'Post cannot be found');
            abort(404);
            // return redirect()->action('PostsController@index');
        }
        if(\Auth::id() != $post->created_by) {
            abort(403);
        }
        $post->delete();

        return redirect()->action('PostsController@index');
    }
}
