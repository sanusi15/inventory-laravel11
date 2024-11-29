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
        Schema::create('equip_computers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('jenis');
            $table->string('merk');
            $table->string('detail_spesification')->nullable();
            $table->string('nominal_price')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('status')->nullable();
            $table->string('computer_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equip_computers');
    }
};
