<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Enrollment;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    
    public function index()
    {
        $enrollments = Enrollment::all();
        return view ('enrollments.index')->with('enrollments',$enrollments);
    }

    
    public function create()
    {
        return view ('enrollments.create');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message','$Enrollment Addedd!');
    }

    
    public function show($id)
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments',$enrollments);
    }

    
    public function edit($id)
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.edit')->with('enrollments',$enrollments);
    }

    public function update(Request $request, $id)
    {
        $enrollments = Enrollment::find($id);
        $input = $request->all();
        $enrollments->update($input);
        return redirect('enrollments')->with('flash_message','$Enrollment Updated!');
    }

    
    public function destroy($id)
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message','Enrollment deleted!');
    }
}
