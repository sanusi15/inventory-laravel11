<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ChangeDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'device_code',
        'type',
        'reason',
        'date',
    ];

    public function computer(): HasOne
    {
        return $this->hasOne(Computer::class, 'code', 'device_code');
    }
    public function laptop(): HasOne
    {
        return $this->hasOne(Laptops::class, 'code', 'device_code');
    }
}
