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
        Schema::create('medical_record_anamneses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('medical_record_id')->constrained('medical_records')->cascadeOnDelete();

            $table->text('chief_complaint')->nullable();
            $table->text('current_illness_history')->nullable();
            $table->text('diagnostic_hypothesis')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_record_anamneses');
    }
};
