<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'pay_period', 'total_salary'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function payslip()
    {
        return $this->hasMany(Payslip::class);
    }

}
