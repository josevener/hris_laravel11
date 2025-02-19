<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payrolls = Payroll::all();
        $users = User::all();

        return view('payroll.index', compact('payrolls','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payrolls = Payroll::all();
        $employees = Employee::with('user')->get();

        return view('payroll.create', compact('payrolls','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('payroll.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        return view('payroll.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {
        return view('payroll.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payroll $payroll)
    {
        return view('payroll.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        return view('payroll.destroy');
    }
}
