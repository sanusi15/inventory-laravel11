<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipComputer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'jenis',
        'merk',
        'detail_spesification',
        'nominal_price',
        'purchase_date',
        'status',
        'computer_code'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($equipcomputer){
            $equipcomputer->code = self::generateEquipComputerCode();
        });
    }

    private static function generateEquipComputerCode()
    {
        $lastComputer = self::orderBy('id', 'desc')->first();
        if(!$lastComputer){
            return 'EQP001';
        }
        $lastCode = $lastComputer->code;
        $lastNumber = (int) substr($lastCode, 3);
        $newNumber = $lastNumber + 1;
        return 'EQP' . str_pad($newNumber, 3, '0', \STR_PAD_LEFT);
    }

    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class, 'computer_code', 'code');
    }
}
