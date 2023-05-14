<?php

use App\Http\Controllers\BookingTicketController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTeamController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ScheduleEventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ----------------------------Route Users------------------------------------
Route::get('/users', [UserController::class, "index"]);
Route::post('/user', [UserController::class, "store"]);
Route::get('/user/{id}', [UserController::class, "show"]);
Route::put('/user/{id}', [UserController::class, "update"]);
Route::delete('/user/{id}', [UserController::class, "destroy"]);

// ----------------------------Route Teams------------------------------------
Route::get('/teams', [TeamController::class, "index"]);
Route::post('/team', [TeamController::class, "store"]);
Route::get('/team/{id}', [TeamController::class, "show"]);
Route::put('/team/{id}', [TeamController::class, "update"]);
Route::delete('/team/{id}', [TeamController::class, "destroy"]);

// ----------------------------Route Schedules------------------------------------
Route::get('/schedules', [ScheduleController::class, "index"]);
Route::post('/schedule', [ScheduleController::class, "store"]);
Route::get('/schedule/{id}', [ScheduleController::class, "show"]);
Route::put('/schedule/{id}', [ScheduleController::class, "update"]);
Route::delete('/schedule/{id}', [ScheduleController::class, "destroy"]);

// ----------------------------Route Events------------------------------------
Route::get('/events', [EventController::class, "index"]);
Route::post('/event', [EventController::class, "store"]);
Route::get('/event/{id}', [EventController::class, "show"]);
Route::put('/event/{id}', [EventController::class, "update"]);
Route::delete('/event/{id}', [EventController::class, "destroy"]);

// ----------------------------Route Countrys------------------------------------
Route::get('/scheduleEvents', [ScheduleEventController::class, "index"]);
Route::post('/scheduleEvent', [ScheduleEventController::class, "store"]);
Route::get('/scheduleEvent/{id}', [ScheduleEventController::class, "show"]);
Route::put('/scheduleEvent/{id}', [ScheduleEventController::class, "update"]);
Route::delete('/scheduleEvent/{id}', [ScheduleEventController::class, "destroy"]);

// ----------------------------Route BoookingTickets------------------------------------
Route::get('/tickets', [TicketController::class, "index"]);
Route::post('/ticket', [TicketController::class, "store"]);
Route::get('/ticket/{id}', [TicketController::class, "show"]);
Route::put('/ticket/{id}', [TicketController::class, "update"]);
Route::delete('/ticket/{id}', [TicketController::class, "destroy"]);

// ----------------------------Route EventTeam------------------------------------

Route::post('/eventTeam', [EventTeamController::class, "getMatches"]);
