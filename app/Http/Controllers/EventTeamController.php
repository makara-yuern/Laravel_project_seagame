<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Team;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventTeams = Event_Team::all();
        return response()->json(['success' => true, 'data' => $eventTeams], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $teamIds)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMatches($eventId)
{
    $teams = Team::where('event_id', $eventId)->get();

    $matches = collect();

    foreach ($teams as $team1) {
        foreach ($teams as $team2) {
            // Skip if it's the same team
            if ($team1->id == $team2->id) {
                continue;
            }

            $match = Event::where(function ($query) use ($team1, $team2) {
                $query->where('team1_id', $team1->id)
                    ->where('team2_id', $team2->id);
            })->orWhere(function ($query) use ($team1, $team2) {
                $query->where('team1_id', $team2->id)
                    ->where('team2_id', $team1->id);
            })->first();

            if ($match) {
                $matches->push($match);
            }
        }
    }

    return $matches;
}
}
