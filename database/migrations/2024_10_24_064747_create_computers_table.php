<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('qr_code')->unique();
            $table->string('merk');
            $table->string('type')->nullable();
            $table->string('product_id')->nullable();
            $table->string('device_id')->nullable();
            $table->string('os');
            $table->integer('ram');
            $table->string('processor');
            $table->string('storage_type_one')->nullable();
            $table->string('storage_capacity_one')->nullable();
            $table->string('storage_type_two')->nullable();
            $table->string('storage_capacity_two')->nullable();
            $table->string('detail_spesification')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('waranty_expiry')->nullable();
            $table->integer('nominal_price')->nullable();
            $table->string('location');
            $table->string('password')->nullable();
            $table->string('status');
            $table->string('information')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
