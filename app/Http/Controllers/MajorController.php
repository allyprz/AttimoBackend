<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Major;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Major::paginate(10);
        return view('majors.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Look for the major
        $major = Major::find($id);

        //Delete the major
        $major->delete();

        return redirect()->route('majors.index')->with('success', 'Major deleted successfully.');
    }
}
