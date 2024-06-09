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
 
      
        Schema::create('clinical_auditors', function (Blueprint $table) {
            $table->id();
            $table->string('nameOfClinic');
            $table->string('auditResult');
            $table->string('fileUpload');
            $table->string('clinicID');
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
        Schema::dropIfExists('clinical_auditors');
    }
};
