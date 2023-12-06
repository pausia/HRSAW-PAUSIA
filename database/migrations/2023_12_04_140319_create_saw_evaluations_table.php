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
        Schema::create('saw_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_alternative');
            $table->unsignedBigInteger('id_criteria');
            $table->foreign('id_alternative')->references('id')->on('saw_alternatives')->onDelete('cascade');
            $table->foreign('id_criteria')->references('id')->on('saw_criterias')->onDelete('cascade');
            $table->float('value');
            $table->timestamps();

            $table->unique(['id_alternative', 'id_criteria']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saw_evaluations');
    }
};
