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
        Schema::create('medical_providers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->bigInteger('specialty_id')->unsigned();
            $table->foreign('specialty_id')->references('id')->on('specialties');
            $table->integer('years_of_experience');
            $table->string('phone_number', 20);
            $table->string('email', 100);
            $table->string('shift_preference', 100);
            $table->integer('shifts_per_month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_providers');
    }
};
