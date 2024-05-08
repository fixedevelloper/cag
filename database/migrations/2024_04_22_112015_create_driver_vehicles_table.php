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
        Schema::create('driver_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('brand')->nullable();
            $table->string('number')->nullable();
            $table->string('color')->nullable();
            $table->string('image_from')->nullable();
            $table->string('image_back')->nullable();
            $table->string('image_left')->nullable();
            $table->string('image_right')->nullable();
            $table->foreignId('driver_id')->nullable()->constrained("users",'id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_vehicles');
    }
};
