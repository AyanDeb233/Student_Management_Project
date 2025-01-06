<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Batch;
use Illuminate\View\View;

class BatchController extends Controller
{
    
    public function index(): View
    {
        $batches = Batch::all();
        return view ('batches.index')->with('batches',$batches);
    }

    
    public function create(): View
    {
        return view ('batches.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Batch::create($input);
        return redirect('batches')->with('flash_message','Batch Addedd!');
    }

    
    public function show($id): View
    {
        $batches = Batch::find($id);
        return view('batches.show')->with('batches',$batches);
    }

    
    public function edit($id): View
    {
        $batches = Batch::find($id);
        return view('batches.edit')->with('batches',$batches);
    }

    
    public function update(Request $request, $id): RedirectResponse
    {
        $batches = Batch::find($id);
        $input = $request->all();
        $batches->update($input);
        return redirect('batch')->with('flash_message','Batch Updated!');
    }

   
    public function destroy($id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batch')->with('flash_message','Batch Updated!');
    }
}
