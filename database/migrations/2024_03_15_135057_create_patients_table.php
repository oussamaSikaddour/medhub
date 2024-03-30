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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('last_name_fr');
            $table->string('first_name_fr');
            $table->string('last_name_ar');
            $table->string('first_name_ar');
            $table->string('email')->unique();
            $table->string('code');
            $table->enum('marital_state', ['single', 'married', 'widowed', 'divorced']);
            $table->enum('gender', ['female', 'male']);
            $table->string('national_card');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->text('address');
            $table->string('first_phone');
            $table->string('second_phone')->nullable();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
