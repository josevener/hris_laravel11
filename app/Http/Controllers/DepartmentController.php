<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Exception;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();

        return view('departments.index', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'department' => 'required|string|max:255',
            ]);

            Department::create($request->all());

            flash()->success('New department has been added successfully');
            return redirect()->route('departments.index');
        } catch (Exception $e) {
            flash()->error('Error adding new department');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'department' => 'required|string|max:255',
            ]);

            $department = Department::findOrFail($id);
            $department->update($request->all());

            flash()->success('Department has been updated successfully');
            return redirect()->route('departments.index');
        } catch (Exception $e) {
            flash()->error('Error updating department');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $department = Department::findOrFail($id);
            $department->delete();

            flash()->success('Department has been deleted successfully');
            return redirect()->route('departments.index');
        } catch (Exception $e) {
            flash()->error('Error deleting department');
            return redirect()->back();
        }
    }
}
