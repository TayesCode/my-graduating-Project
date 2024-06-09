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
        Schema::create('payments', function (Blueprint $table) {
    
            $table->string('paymentID')->primary();
            $table->date('dateOfPayment');
            $table->string('typesOfPayment');
            $table->string('amount');

            $table->string('cashier');
            $table->string('waysOfPayment');
             $table->string('accountID');
             $table->string('staffID');
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
        Schema::dropIfExists('payments');
    }
};
