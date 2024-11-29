<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'qr_code',
        'merk',
        'type',
        'product_id',
        'device_id',
        'os',
        'ram',
        'processor',
        'storage_type_one',
        'storage_capacity_one',
        'storage_type_two',
        'storage_capacity_two',
        'detail_spesification',
        'purchase_date',
        'waranty_expiry',
        'nominal_price',
        'location',
        'password',
        'status',
        'information',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($computer){
            $computer->code = self::generateComputerCode();
            $computer->qr_code = self::generateRandomString();
        });
    }

    private static function generateComputerCode()
    {
        $lastComputer = self::orderBy('id', 'desc')->first();
        if(!$lastComputer){
            return 'COM001';
        }
        $lastCode = $lastComputer->code;
        $lastNumber = (int) substr($lastCode, 3);
        $newNumber = $lastNumber + 1;
        return 'COM' . str_pad($newNumber, 3, '0', \STR_PAD_LEFT);
    }

    private static function generateRandomString($length = 30)
    {
        do{
            $randomString = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
            $exist = self::where('qr_code', $randomString)->exists();
        }while($exist);
        return $randomString;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function equipComputer(): HasMany
    {
        return $this->hasMany(EquipComputer::class, 'computer_code', 'code');
    }
}
