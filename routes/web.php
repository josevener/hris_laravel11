<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::user()) {
        return view('dashboard');
    } else {
        return view('auth.login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class)->except(['create', 'edit', 'show'])
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('employees', EmployeeController::class)->except('create');

    // Route for fetching designations based on department
});
Route::get('employees/get-designations/{departmentId}', [EmployeeController::class, 'getDesignationsByDepartment']);

Route::resource('departments', DepartmentController::class)->except(['create', 'edit', 'show'])
    ->middleware('auth');

Route::resource('positions', PositionController::class)->except(['create', 'edit', 'show'])
    ->middleware('auth');

Route::resource('designations', DesignationController::class)->except(['create', 'edit', 'show'])
    ->middleware('auth');

Route::resource('holidays', HolidayController::class)->except(['create', 'edit', 'show'])
    ->middleware('auth');

// Route::resource('salary', SalaryController::class)->middleware('auth');
Route::middleware('auth')->group(function(){
    Route::get('/salary/create', [SalaryController::class, 'create'])->name('salary.create');
    Route::get('/salary', [SalaryController::class, 'index'])->name('salary.index');
    Route::post('/salary', [SalaryController::class, 'store'])->name('salary.store');
    Route::delete('/salary/{id}', [SalaryController::class, 'destroy'])->name('salary.destroy');
    Route::put('/salary/{salary}', [SalaryController::class, 'update'])->name('salary.update');
    Route::get('/salary/{salary}/edit', [SalaryController::class, 'edit'])->name('salary.edit');
});

Route::resource('payroll', PayrollController::class)->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/payslip', [PayslipController::class, 'index'])->name('payslip.index');
    Route::get('/payslip/{employeeId}/show', [PayslipController::class, 'show'])->name('payslip.show');
});


require __DIR__ . '/auth.php';
