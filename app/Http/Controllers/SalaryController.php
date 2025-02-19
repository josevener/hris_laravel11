<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Salary;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $employees = Employee::with(['salary', 'department', 'user'])->get();
        $salaries = Salary::with('employee')->get();

        return view('salary.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payrolls = Payroll::all();
        $employees = Employee::with('user')->whereDoesntHave('salary')->get();

        return view('salary.create', compact('payrolls', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'employee_id' => 'required|numeric',
                'net_salary' => 'required|numeric',
                'basic_salary' => 'required|numeric',
                'sss' => 'nullable|numeric',
                'pag_ibig' => 'nullable|numeric',
                'philhealth' => 'nullable|numeric',
                'meal_allowance' => 'nullable|numeric',
                'transpo_allowance' => 'nullable|numeric',
            ]);

            // Create salary record and capture the instance
            $salary = Salary::create([
                'employee_id' => $request->employee_id,
                'net_salary' => $request->net_salary,
                'basic_salary' => $request->basic_salary,
                'sss' => $request->sss ?? 0,
                'pag_ibig' => $request->pag_ibig ?? 0,
                'philhealth' => $request->philhealth ?? 0,
                'meal_allowance' => $request->meal_allowance ?? 0,
                'transpo_allowance' => $request->transpo_allowance ?? 0,
            ]);

            // Update the Employee record with the new salary_id
            $employee = Employee::find($request->employee_id);
            if ($employee) {
                $employee->salary_id = $salary->id; // Use the newly created salary ID
                $employee->save();
            }

            flash()->success('Salary created successfully');
            return redirect()->route('salary.index');
        } catch (Exception $e) {
            flash()->error('Failed to save employee salary: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return view('salary.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $employees = Employee::with('user')->whereDoesntHave('salary')->get();

        return view('salary.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        try {

            $request->validate([
                'net_salary' => 'required|numeric',
                'basic_salary' => 'required|numeric',
                'sss' => 'nullable|numeric',
                'pag_ibig' => 'nullable|numeric',
                'philhealth' => 'nullable|numeric',
                'meal_allowance' => 'nullable|numeric',
                'transpo_allowance' => 'nullable|numeric',
            ]);

            $salary->update($request->all());

            flash()->success('Salary updated successfully');
            return redirect()->route('salary.index');
        } catch (Exception $e) {
            flash()->error('Failed to update employee salary: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $salary = Salary::findOrFail($id);
            $salary->delete();

            flash()->success('Salary deleted successfully');
            return redirect()->route('salary.index');
        } catch (Exception $e) {
            flash()->error('Failed to delete salary: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
