<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUserId = Auth::id();
        $employees = Employee::with(['user', 'department', 'designation'])->get();
        $departments = Department::all();
        $designations = Designation::with('department')->get();
        $supervisors = User::all();

        $users = User::whereDoesntHave('employee') // Users without an employee record
            ->where('id', '!=', $currentUserId) // Exclude current user
            ->get();


        return view('employees.index', compact('employees', 'users', 'departments', 'designations', 'supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'employeeId' => 'required|string',
            'department_id' => 'required|numeric',
            'designation_id' => 'required|numeric',
            'birth_date' => 'nullable|string',
            'gender' => 'nullable|string',
            'reports_to' => 'nullable|string',
        ]);

        try {
            Employee::create([
                'user_id' => $request->user_id,
                'employeeId' => $request->employeeId,
                'department_id' => $request->department_id,
                'designation_id' => $request->designation_id,
                'birthdate' => $request->birth_date,
                'gender' => $request->gender,
                'reports_to' => $request->reports_to
            ]);

            flash()->success('New employee has been added successfully');
            return redirect()->route('employees.index');
        } catch (Exception $e) {
            flash()->error('Failed to save employees record: ' . $e);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $employee->load(['user', 'position', 'department']);

        $supervisors = User::all();
        $positions = Position::all();
        $departments = Department::all();

        return view('employees.edit', compact('employee', 'positions', 'departments', 'supervisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'department_id' => 'required|numeric',
            'designation_id' => 'required|numeric',
            'birth_date' => 'required|string',
            'gender' => 'required|string',
            'reports_to' => 'required|string',
            'phone_number' => 'nullable|string',
        ]);

        try {
            // Update employee fields
            $employee->update([
                'department_id' => $request->department_id,
                'designation_id' => $request->designation_id,
                'birthdate' => $request->birth_date,
                'gender' => $request->gender,
                'reports_to' => $request->reports_to,
            ]);

            // Update related user details (if exists)
            if ($employee->user) {
                $employee->user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                ]);
            }

            flash()->success('Employee record updated successfully');

            return redirect()->route('employees.index');
        } catch (Exception $e) {
            flash()->error('Error updating employee record: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);

            // if ($employee->user) {
            //     $employee->user->delete();
            // }

            $employee->delete();

            flash()->success('Employee record deleted successfully');
            return redirect()->route('employees.index');
        } catch (Exception $e) {
            flash()->error('Error deleting employee record: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    // Method to get designations based on department
    public function getDesignationsByDepartment($departmentId)
    {
        // Retrieve the designations for the given department
        $designations = Designation::where('department_id', $departmentId)->get();

        // Return the designations as JSON
        return response()->json($designations);
    }
}
