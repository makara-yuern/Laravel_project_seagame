<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'created_by_id',
        'team_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ticket(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function eventTeam()
    {
        return $this->belongsToMany(Team::class, 'event__teams');
    }
    
    public function scheduleEvent()
    {
        return $this->belongsToMany(Schedule::class, 'schedule__events');
    }
}
