<?php

namespace Database\Seeders;

use App\Models\RoleTypeUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleTypeUser::firstOrCreate(['role_type' => 'Admin']);
        RoleTypeUser::firstOrCreate(['role_type' => 'Super Admin']);
        RoleTypeUser::firstOrCreate(['role_type' => 'Normal User']);
        RoleTypeUser::firstOrCreate(['role_type' => 'Client']);
        RoleTypeUser::firstOrCreate(['role_type' => 'Employee']);

    }
}
