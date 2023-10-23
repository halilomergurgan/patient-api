<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('notes')->nullable();
            $table->timestamps();
        });

        Schema::table('patient_medical_conditions', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id');

            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_medical_conditions');
    }
};
