<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Session;
use Log;

class StudentsController extends Controller
{

    public function index()
    {
        // 1. Model queries the db
        // 2. Pass the results/rows form the model to the view

        $students = Student::paginate(4);
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

        $student = new Student();
        $student->first_name = $request->first_name;
        $student->school_name = $request->school_name;
        $student->subscribed = $request->subscribed;
        $student->description = $request->description;
        if($request->subscribed === 'on') {
            $student->subscribed = true; 
        } else {
            $student->subscribed = false; 
        }

        Session::flash('successMessage', 'Post saved successfully');

        $student->save();

        return redirect()->action('StudentsController@index');
        // return back()->withInput(); // Redirects back to the previous page (/students/create) with all the user input

    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('students.show')->with('student', $student);
    }

    public function edit($id)
    {
        $student = Student::find($id);
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
