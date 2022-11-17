<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('visa_info', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->bigInteger('phone')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();

            $table->string('place_of_birth')->nullable();
            $table->string('country_of_residency')->nullable();
            $table->string('place_of_issue')->nullable();

            $table->string('passport_no')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('arrival_date')->nullable();
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->bigInteger('visa_duration')->nullable();
            $table->string('visa_status')->nullable();
            $table->string('passport_picture')->nullable();
            $table->string('personal_picture')->nullable();
            $table->string('check_in_date')->nullable();
            $table->string('check_out_date')->nullable();
            $table->string('rom_type')->nullable();
            $table->string('rom_extra_type')->nullable();
            $table->timestamps();
            $table->string('companion_fname')->nullable();
            $table->string('companion_lname')->nullable();
            $table->string('companion_date_of_birth')->nullable();
            $table->string('companion_gender')->nullable(); 
            $table->string('companion_place_of_birth')->nullable();
            $table->string('companion_country_of_residency')->nullable();
            $table->string('companion_place_of_issue')->nullable();
            $table->string('companion_passport_no')->nullable();
            $table->string('companion_issue_date')->nullable();
            $table->string('companion_expiry_date')->nullable();
            $table->string('companion_arrival_date')->nullable();
            $table->string('companion_profession')->nullable();
            $table->string('companion_organization')->nullable();
            $table->bigInteger('companion_visa_duration')->nullable();
            $table->string('companion_visa_status')->nullable();
            $table->string('companion_passport_picture')->nullable();
            $table->string('companion_personal_picture')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visa_info');
    }
}
