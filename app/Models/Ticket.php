<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'seat',
        'price',
        'user_id',
        'schedule_id',
    ];

    public static function store($reques, $id = null)
    {
        $ticket = $reques->only(['seat', 'price','user_id', 'schedule_id']);

        $ticket = self::updateOrCreate(['id' => $id], $ticket);

        return $ticket;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function schedule(): HasOne
    {
        return $this->hasOne(Schedule::class);
    }
}
