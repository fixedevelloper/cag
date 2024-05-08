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
        Schema::create('annonce_selecteds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annonce_id')->nullable()->constrained("annonces",'id')->nullOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained("users",'id')->nullOnDelete();
            $table->text('comment')->nullable();
            $table->string('status')->default(\App\Helpers\Helper::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonce_selecteds');
    }
};
