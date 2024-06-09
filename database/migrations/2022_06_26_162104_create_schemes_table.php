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
        Schema::create('schemes', function (Blueprint $table) {
            $table->string('schemeID')->priamry();
            $table->string('name');
            $table->string('region');
            $table->string('zone');
            $table->string('woreda');
            $table->string('officeTelephone');
            $table->string('fax');
            $table->string('email')->unique()->nullable();
            $table->string('bankAccountID');
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
        Schema::dropIfExists('schemes');
    }
};
