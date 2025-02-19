<?php

namespace Database\Seeders;

use App\Models\Holiday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Holiday::firstOrCreate([
            'name_holiday' => "New Year’s Day",
            'date_holiday' => "01 Jan, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "The Day of Valor",
            'date_holiday' => "09 Apr, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Maundy Thursday",
            'date_holiday' => "17 Apr, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Good Friday",
            'date_holiday' => "18 Apr, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Holy Saturday",
            'date_holiday' => "19 Apr, 2025",
            'type_holiday' => "Special (Non-Working) Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Easter Sunday",
            'date_holiday' => "20 Apr, 2025",
            'type_holiday' => "Observance"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Labor Day",
            'date_holiday' => "01 May, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Independence Day",
            'date_holiday' => "12 Jun, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Ninoy Aquino Day",
            'date_holiday' => "21 Aug, 2025",
            'type_holiday' => "Special (Non-Working) Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "National Heroes Day",
            'date_holiday' => "01 Sep, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Bonifacio Day",
            'date_holiday' => "30 Nov, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Christmas Day",
            'date_holiday' => "25 Dec, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "Rizal Day",
            'date_holiday' => "30 Dec, 2025",
            'type_holiday' => "Regular Holiday"
        ]);

        Holiday::firstOrCreate([
            'name_holiday' => "New Year's Eve",
            'date_holiday' => "31 Dec, 2025",
            'type_holiday' => "Special (Non-Working) Holiday"
        ]);

    }
}
