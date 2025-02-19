<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employeeId',
        'department_id',
        'designation_id',
        'birthdate',
        'reports_to',
        'gender'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function salary()
    {
        return $this->hasMany(Salary::class);
    }

    public function payslip()
    {
        return $this->belongsTo(Payslip::class);
    }

    public function payroll()
    {
        return $this->hasMany(Payroll::class);
    }

    public function  attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
