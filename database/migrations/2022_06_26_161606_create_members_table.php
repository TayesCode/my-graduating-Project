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
        Schema::create('members', function (Blueprint $table) {
            $table->string('memberID')->primary();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('phone');
            $table->string('occopation');
            $table->string('region');
            $table->string('zone');
            $table->string('woreda');
            $table->string('kebele');
            $table->string('email')->unique()->nullable();
            $table->string('userName')->unique();
            $table->string('password');
            $table->string('photo');
            $table->foreign('member_employeeID')->references('employeeID')->on('staff')->onDelete('cascade');
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
        Schema::dropIfExists('members');
    }
};
