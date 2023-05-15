<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    

    // public function ticket(): HasMany
    // {
    //     return $this->hasMany(User::class);
    // }

    // public function schedule(): BelongsTo
    // {
    //     return $this->belongsTo(Schedule::class);
    // }

   
    public static function store($request, $id = null)
    {
        $team = $request->only(['name', 'description','user_id']);

        $event = self::updateOrCreate(['id' => $id], $team);

        $teams = request('teams');
        $event->teams()->sync($teams);
        
        return $event;
    }

    

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'event_teams');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
