<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDate = Carbon::today()->format('d-m-Y');

        $holidays = Holiday::all();

        return view('holidays.index', compact('holidays', 'currentDate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('holidays.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name_holiday' => 'required|string',
                'date_holiday' => 'required|string',
                'type_holiday' => 'required|string',
            ]);

            Holiday::create($request->all());

            flash()->success('New holiday record has been added');
            return redirect()->route('holidays.index');
        } catch (Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Holiday $holiday)
    {
        return view('holidays.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Holiday $holiday)
    {
        return view('holidays.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name_holiday' => 'required|string',
                'date_holiday' => 'required|string',
                'type_holiday' => 'required|string',
            ]);

            $holiday = Holiday::findOrFail($id);
            $holiday->update($request->all());

            flash()->success('Holiday record has been updated');
            return redirect()->route('holidays.index');
        } catch (Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $holiday = Holiday::findOrFail($id);

            $holiday->delete();

            flash()->success('Holiday record has been deleted');
            return redirect()->route('holidays.index');
        } catch (Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
