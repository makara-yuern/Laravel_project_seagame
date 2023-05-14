<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $event = EventResource::collection($events);
        $name = request('name');
        $events = Event::where('name', 'like', '%'.$name.'%')->get();
        return response()->json(['success' =>true, 'data' => $event],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_by_id' => $request->input('created_by_id'),
            'team_id' => $request->input('team_id')
        ]);
        return response()->json(['success' =>true,'message' =>"create successfully", 'data' => $event],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return response()->json(['success' =>true, 'data' => $event],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
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
}
