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
        Schema::create('medical_stays', function (Blueprint $table) {
            $table->id();
            $table->date('entry_date');
            $table->string('room');
            $table->string('bed')->nullable();
            $table->string('entry_mode');
            $table->text('diagnostic')->nullable();
            $table->date('release_date')->nullable();
            $table->string('release_mode')->nullable();
            $table->string('release_state')->nullable();
            $table->text('indication_given')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_stays');
    }
};
