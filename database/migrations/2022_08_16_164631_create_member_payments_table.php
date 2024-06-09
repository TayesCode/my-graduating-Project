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
        Schema::create('member_payments', function (Blueprint $table) {
             $table->id();
             $table->string('typesOfPayment');
             $table->date('dateOfPayment');
             $table->string('amount');
             $table->string('waysOfPayment');
             $table->string('accountID') ;
             $table->string('memberID');
             $table->string('employeeID');
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
        Schema::dropIfExists('member_payments');
    }
};
