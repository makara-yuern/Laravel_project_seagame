<?php

use App\Http\Controllers\BookingTicketController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
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
Route::get('/countries', [CountryController::class, "index"]);
Route::post('/country', [CountryController::class, "store"]);
Route::get('/country/{id}', [CountryController::class, "show"]);
Route::put('/country/{id}', [CountryController::class, "update"]);
Route::delete('/country/{id}', [CountryController::class, "destroy"]);

// ----------------------------Route BoookingTickets------------------------------------
Route::get('/bookings', [BookingTicketController::class, "index"]);
Route::post('/booking', [BookingTicketController::class, "store"]);
Route::get('/booking/{id}', [BookingTicketController::class, "show"]);
Route::put('/booking/{id}', [BookingTicketController::class, "update"]);
Route::delete('/booking/{id}', [BookingTicketController::class, "destroy"]);