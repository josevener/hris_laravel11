<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payslip;
use Illuminate\Http\Request;

class PayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('payslip')->get();

        return view('payslip.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payslip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('payslip.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payslip $payslip)
    {
        return view('payslip.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payslip $payslip)
    {
        return view('payslip.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payslip $payslip)
    {
        return view('payslip.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payslip $payslip)
    {
        return view('payslip.destroy');
    }
}
