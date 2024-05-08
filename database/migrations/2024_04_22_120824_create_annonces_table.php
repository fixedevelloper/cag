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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->nullable()->constrained("users",'id')->nullOnDelete();
            $table->foreignId('city_from_id')->nullable()->constrained("cities",'id')->nullOnDelete();
            $table->foreignId('city_to_id')->nullable()->constrained("cities",'id')->nullOnDelete();
            $table->double('distance')->nullable();
            $table->integer('number_person')->default(0);
            $table->integer('reserved_place')->default(0);
            $table->double('price')->nullable();
            $table->date('date_start');
            $table->time('time_start');
            $table->string('departure_place')->nullable();
            $table->string('departure_latitude')->nullable();
            $table->string('departure_longitude')->nullable();
            $table->foreignId('driver_vehicle_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
