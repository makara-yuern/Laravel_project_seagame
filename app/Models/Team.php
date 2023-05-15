<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'teamName',
        'members',
        'user_id',
    ];

    
    public static function store($reques, $id = null)
    {
        $team = $reques->only(['teamName', 'members','user_id']);

        $team = self::updateOrCreate(['id' => $id], $team);

        return $team;
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_teams');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
