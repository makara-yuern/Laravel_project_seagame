<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'event_id',
        'schedule_id',
    ];

    public static function store($reques, $id = null)
    {
        $scheduleEvent = $reques->only(['location', 'event_id','schedule_id']);

        $scheduleEvent = self::updateOrCreate(['id' => $id], $scheduleEvent);

        return $scheduleEvent;
    }
}
