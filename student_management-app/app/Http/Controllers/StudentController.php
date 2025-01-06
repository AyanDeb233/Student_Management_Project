<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $students = Student::all();
        return view ('students.index')->with('students',$students)
;   }

    
    public function create(): View
    {
        return view ('students.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Student::create($input);
        return redirect('students')->with('flash_message','$Student Addedd!');
    }

    
    public function show($id): View
    {
        $students = Student::find($id);
        return view('students.show')->with('students',$students);
    }

    
    public function edit($id): View
    {
        $students = Student::find($id);
        return view('students.edit')->with('students',$students);
    }

    
    public function update(Request $request, $id): RedirectResponse
    {
        $students = Student::find($id);
        $input = $request->all();
        $students->update($input);
        return redirect('students')->with('flash_message','$Student Updated!');
    }

    
    public function destroy($id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message','$Student Updated!');
    }
}
