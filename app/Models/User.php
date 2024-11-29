<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'level',
        'name',
        'username',
        'password',
        'id_position',
        'id_job',
        'id_company',
    ];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Positions::class, 'id_position', 'id');
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'id_job', 'job_no');
    }

    public function computer(): HasOne
    {
        return $this->hasOne(Computer::class, 'user_id', 'id');
    }
    public function laptop(): HasOne
    {
        return $this->hasOne(Laptops::class, 'user_id', 'id');
    }
}
