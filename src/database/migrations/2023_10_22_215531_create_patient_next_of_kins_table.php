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
        Schema::create('patient_next_of_kins', function (Blueprint $table) {
            $table->id();
            $table->string('id_card', 255);
            $table->string('name');
            $table->string('surname');
            $table->string('contact_number1', 20)->nullable();
            $table->string('contact_number2', 20)->nullable();
            $table->timestamps();
        });

        Schema::table('patient_next_of_kins', function (Blueprint $table) {
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
        Schema::dropIfExists('patient_next_of_kins');
    }
};
