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

    public static function store($request, $id = null)
    {
        $team = $request->only(['date', 'time','location','event_id']);

        $event = self::updateOrCreate(['id' => $id], $team);
        
        return $event;
    }

    public function ticket(): HasOne
    {
        return $this->hasOne(Ticket::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
