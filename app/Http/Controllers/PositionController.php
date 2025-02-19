<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('positions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('positions.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return view('positions.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        return view('positions.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        return view('positions.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        return view('positions.destroy');
    }
}
