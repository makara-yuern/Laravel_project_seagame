<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Http\Resources\ScheduleResource;
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
        $schedules = ScheduleResource::collection($schedules);
        return response()->json(['success' =>true,'data' => $schedules],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleRequest $request)
    {
        $schedule = Schedule::store($request);
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
    public function update(ScheduleRequest $request, string $id)
    {
        $schedule = Schedule::store($request);
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
