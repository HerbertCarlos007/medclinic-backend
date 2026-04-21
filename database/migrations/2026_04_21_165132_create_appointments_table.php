<?php

use App\Enums\AppointmentStatus;
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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id')->constrained('clinics')->cascadeOnDelete();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();

            $table->timestamp('scheduled_at');
            $table->integer('duration')->default(30);
            $table->enum('status', array_column(AppointmentStatus::cases(), 'value'))->default(AppointmentStatus::SCHEDULED->value);
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->index('clinic_id');
            $table->unique(['doctor_id', 'scheduled_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
