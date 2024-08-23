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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedInteger('phone_number')->nullable();
            $table->string('ip')->nullable();
            $table->foreignId('owner_id')->nullable();
            $table->foreignId('type_id');
            $table->foreignId('location_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
