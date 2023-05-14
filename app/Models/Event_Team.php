<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'team_id',
    ];
}
