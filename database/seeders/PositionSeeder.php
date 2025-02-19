<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::firstOrCreate(['title' => 'Web Designer']);
        Position::firstOrCreate(['title' => 'Web Developer']);
        Position::firstOrCreate(['title' => 'Manager']);
        Position::firstOrCreate(['title' => 'CEO']);
        Position::firstOrCreate(['title' => 'CFO']);
        Position::firstOrCreate(['title' => 'Android Developer']);
        Position::firstOrCreate(['title' => 'IOS Developer']);
    }
}
