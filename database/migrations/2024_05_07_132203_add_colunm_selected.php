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
        Schema::table('annonce_selecteds', function (Blueprint $table) {
            $table->string('method_payment')->nullable();
            $table->string('code_follow')->nullable();
            $table->integer('passenger')->default(1);
            $table->double('total')->default(0.0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
