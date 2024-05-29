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
        Schema::create('filials', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->foreignId('city_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('phone');
            $table->string('twogis_link')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('exchange_rates')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filials');
    }
};
