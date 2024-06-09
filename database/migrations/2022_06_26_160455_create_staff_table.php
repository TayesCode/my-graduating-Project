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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('employeeID')->primary();
            $table->string('firstName');
            $table->string('middleName')->default('Derbew');
            $table->string('lastName');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('email')->unique()->nullable();
            $table->string('region');
            $table->string('zone');
            $table->string('woreda');
            $table->string('kebele');
            $table->string('phone');
            $table->string('profession');
            $table->string('levelOfEducation');
            $table->string('userName')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('schemeID');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
};
