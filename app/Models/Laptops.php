<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Laptops extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'qr_code',
        'merk',
        'type',
        'product_id',
        'device_id',
        'processor',
        'os',
        'ram',
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
        // Generate kode laptop sebelum create
        static::creating(function($laptop){
            $laptop->code = self::generateLaptopCode();
            $laptop->qr_code = self::generateRandomString();
        });
    }

    private static function generateLaptopCode()
    {
        // Ambil kode laptop terakhir dari database
        $lastlaptop = self::orderBy('id', 'desc')->first();
        // Jika belum ada kode laptop, mulai dari LTP001
        if(!$lastlaptop){
            return 'LTP001';
        }
        // Ambil kode terakhir dan ubah menjadi angka
        $lastCode = $lastlaptop->code;
        $lastNumber = (int) substr($lastCode, 3); //Ambil angka setelah 'LTP'
        // Tambahkan 1 untuk kode berikut nya
        $newNumber = $lastNumber + 1;
        // Format menjadi LTP + 3 digit angka
        return 'LTP' . str_pad($newNumber, 3, '0', \STR_PAD_LEFT);
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