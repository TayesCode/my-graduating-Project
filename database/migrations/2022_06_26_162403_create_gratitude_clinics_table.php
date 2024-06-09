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
        Schema::create('gratitude_clinics', function (Blueprint $table) {
            $table->string('g-ClinicID')->primary();
            $table->string('name')->unique();
            $table->string('region');
            $table->string('zone');
            $table->string('woreda');
            $table->string('servicies');
            $table->string('fax');
            $table->string('postalCode');
            $table->string('email')->unique()->nullable();
            $table->string('officeTelephone')->unique();
            $table->string('staffID');
            $table->string('accountID');

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
        Schema::dropIfExists('gratitude_clinics');
    }
};
