<?php

namespace App\Http\Controllers;

use App\Models\Schedule_Event;
use Illuminate\Http\Request;

class ScheduleEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduleEvents = Schedule_Event::all();
        return response()->json(['success' =>true,'data' => $scheduleEvents],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $scheduleEvent = Schedule_Event::create([
            'location' => $request->input('location'),
            'event_id' => $request->input('event_id'),
            'schedule_id' => $request->input('schedule_id'),
        ]);
        return response()->json(['success' =>true,'message' =>"create successfully", 'data' => $scheduleEvent],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $scheduleEvent = Schedule_Event::find($id);
        return response()->json(['success' =>true,'data' => $scheduleEvent],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $scheduleEvent = Schedule_Event::find($id);
        $scheduleEvent->update([
            'location' => $request->input('location')
        ]);
        return response()->json(['success' =>true,'message' =>"update successfully", 'data' => $scheduleEvent],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $scheduleEvent = Schedule_Event::find($id);
        $scheduleEvent->delete();
        return response()->json(['success' =>true,'message' =>"delete successfully", 'data' => $scheduleEvent],200);
    }
}
