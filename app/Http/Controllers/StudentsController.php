<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{

    public function index()
    {
        // 1. Model queries the db
        // 2. Pass the results/rows form the model to the view

        $students = \App\Models\Student::all();
        return view('students.index')->with('students', $students);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:200',
            'school_name' => 'required'
        ];

        $this->validate($request, $rules);

        $student = new \App\Models\Student();
        $student->first_name = $request->first_name;
        $student->school_name = $request->school_name;
        $student->subscribed = $request->subscribed;
        $student->description = $request->description;
        $student->save();

        return redirect()->action('StudentsController@index');
        // return back()->withInput(); // Redirects back to the previous page (/students/create) with all the user input

    }

    public function show($id)
    {
        $student = \App\Models\Student::find($id);
        return view('students.show')->with('student', $student);
    }

    public function edit($id)
    {
        return view('students.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
