<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return response()->json(['success' =>true,'data' => $schedules],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schedule = Schedule::create([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'event_id' => $request->input('event_id'),
        ]);
        return response()->json(['success' =>true,'message' =>"create successfully", 'data' => $schedule],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schedule = Schedule::find($id);
        return response()->json(['success' =>true,'data' => $schedule],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = Schedule::find($id);
        $schedule->update([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
        ]);
        return response()->json(['success' =>true,'message' =>"update successfully", 'data' => $schedule],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return response()->json(['success' =>true,'message' =>"delete successfully", 'data' => $schedule],200);
    }
}
