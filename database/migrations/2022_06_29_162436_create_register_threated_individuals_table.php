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

        Schema::create('register_threated_individuals', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('memberId');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('phone')->unique();
            $table->string('gratitudeclinicID');
            $table->string('cardOfficer');

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
        Schema::dropIfExists('register_threated_individuals');
    }
};
