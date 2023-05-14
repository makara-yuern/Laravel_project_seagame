<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $user = UserResource::collection($users);
        return response()->json(['success' =>true, 'data' => $user],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
        ]);

        return response()->json(['success' =>true, 'all users' => $user],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json(['success' =>true, 'data' => $user],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
        ]);
        return response()->json(['success' =>true, 'data' => $user],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd(1);
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' =>true, 'data' => $user],200);
    }
}
