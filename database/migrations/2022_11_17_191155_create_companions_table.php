<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companions', function (Blueprint $table) {
            $table->id();
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
            $table->unsignedBigInteger('guest_id');
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('companions');
    }
}
