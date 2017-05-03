<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\User;
use Log;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>  ['show']]);
    }

    public function index()
    {
        $userId = \Auth::id();
        $posts = Post::where('created_by', $userId)->get();
        return view('users.index')->with(compact('posts', 'userId'));
    }

    public function create(Request $request, $id)
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return view('users.userAccount', ['user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user) {
            Log::info('Cannot edit User');
            $request->session()->flash('errorMessage', 'User cannot be found');
            abort(404);
        }

        return view('users.editUser', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $rules = User::$rules;
        // $validator = \Validator::make($request->all(), $rules);

        // dd(get_class_methods(get_class($validator->getMessageBag())));

        $user = User::find($id);
        if(!$user) {
            Log::info('Cannot edit user');
            $request->session()->flash('errorMessage', 'User cannot be found');
            abort(404);
        } 

        if($user->email != $request->email) {
            $rules['email'] .= '|unique:users'; 
        }
        $this->validate($request, $rules);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= $request->password;
        $user->save();
        $request->session()->flash('sucessMessage', 'User updated successfully');
        return redirect()->action('UsersController@show', [$user->id]);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user) {
            Log::info("Cannot delete User: $id");
            $request->session()->flash('errorMessage', 'User cannot be found');
            abort(404);
        }

        $user->delete();
        return redirect()->action('PostsController@index');
    }
}
