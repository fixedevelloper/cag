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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone');
            $table->integer('user_type')->comment("0:admin,1:driver,2:customer");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('activated')->default(false);
            $table->string('city')->nullable();
            $table->date('date_born')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('document_id')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_recto')->nullable();
            $table->string('document_verso')->nullable();
            $table->string('address')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->string('driving_license_from')->nullable();
            $table->string('driving_license_back')->nullable();
            $table->string('photo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->boolean('phone_verified')->default(false);
            $table->boolean('email_verified')->default(false);
            $table->string('unique_number')->nullable();
            $table->double('balance')->default(0.0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
