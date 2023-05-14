<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'event_id',
        'schedule_id',
    ];
}
