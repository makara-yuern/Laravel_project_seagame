<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'location',
        'event_id',
    ];

    public function ticket(): HasOne
    {
        return $this->hasOne(Ticket::class);
    }

    public function events()
    {
        return $this->belongsToMany(User::class, 'schedule_events');
    }
}
