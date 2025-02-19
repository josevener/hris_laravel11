<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Exception;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $designations = Designation::with('department')->get();

        return view('designations.index', compact('departments', 'designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'designation' => 'required|string|max:255',
                'department_id' => 'required|numeric',
            ]);
            Designation::create($request->all());
            flash()->success('New record has been added successfully');
            return redirect()->route('designations.index');
        } catch (Exception $e) {
            flash()->error('Error creating record: ' + $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        return view('designations.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('designations.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'designation' => 'required|string|max:255',
                'department_id' => 'required|numeric',
            ]);

            $designation = Designation::findOrFail($id);
            $designation->update($request->all());

            flash()->success('Record has been updated successfully');
            return redirect()->route('designations.index');
        } catch (Exception $e) {
            flash()->error('Error updating record: ' + $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $designation = Designation::findOrFail($id);
            $designation->delete();

            flash()->success('Record has been deleted successfully');
            return redirect()->route('designations.index');
        } catch (Exception $e) {
            flash()->error('Error deleting record');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
