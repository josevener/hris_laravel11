<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::firstOrCreate(['type_name' => 'Active']);
        UserType::firstOrCreate(['type_name' => 'Inactive']);
        UserType::firstOrCreate(['type_name' => 'Disable']);
    }
}
