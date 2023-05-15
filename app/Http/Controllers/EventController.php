<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use App\Models\ScheduleEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $events = EventResource::collection($events);
        $name = request('name');
        $event = Event::where('name', 'like', '%'.$name.'%')->first();
        return response()->json(['success' =>true, 'data' => $events],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $event = Event::store($request);
        return response()->json(['success' =>true,'message' =>"create successfully", 'data' => $event],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        $event = new EventResource($event);
        return response()->json(['success' => true, 'data' => $event], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        $event = Event::store($request, $id);
        return response()->json(['success' =>true,'message' =>"update successfully", 'data' => $event],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['success' =>true,'message' =>"delete successfully", 'data' => $event],200);
    }

    public function scheduleEvent(Request $request){
        
        $scheduleEvent = ScheduleEvent::create([
            'location' => request('location'),
            'event_id' => request('event_id'),
            'schedule_id' => request('schedule_id'),
        ]);

        return response()->json(['success' => true, 'data' => $scheduleEvent], 201);
    }
}
