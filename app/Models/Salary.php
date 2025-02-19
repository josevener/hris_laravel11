<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'basic_salary',
        'meal_allowance',
        'transpo_allowance',
        'sss',
        'philhealth',
        'pag_ibig',
        'net_salary'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
