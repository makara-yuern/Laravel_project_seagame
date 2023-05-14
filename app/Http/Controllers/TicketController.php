<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        $ticket = TicketResource::collection($tickets);
        return response()->json(['success' =>true,'data' => $ticket],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'seat' => $request->input('seat'),
            'price' => $request->input('price'),
            'user_id' => $request->input('user_id'),
            'schedule_id' => $request->input('schedule_id'),
        ]);
        return response()->json(['success' =>true,'message' =>"create successfully", 'data' => $ticket],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        return response()->json(['success' =>true,'data' => $ticket],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->update([
            'seat' => $request->input('seat'),
            'price' => $request->input('price'),
        ]);
        return response()->json(['success' =>true,'message' =>"update successfully", 'data' => $ticket],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['success' =>true,'message' =>"delete successfully", 'data' => $ticket],200);
    }
}
