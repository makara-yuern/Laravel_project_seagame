<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'age',
        'email',
        'gender',
    ];

    public static function store($reques, $id = null)
    {
        $user = $reques->only(['firstName', 'lastName','age', 'email', 'gender']);

        $user = self::updateOrCreate(['id' => $id], $user);

        return $user;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
    
    public function ticket(): HasOne
    {
        return $this->hasOne(Ticket::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
