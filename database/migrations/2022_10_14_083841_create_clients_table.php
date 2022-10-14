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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('number');
            $table->string('address');
            $table->string('pincode');
            $table->string('aadhar_number');
            $table->string('business_name');
            $table->string('gst_no');
            $table->string('team_size');
            $table->string('requirements');
            $table->string('notes');
            $table->string('client_code');
            $table->string('lead_source');
            $table->string('sales_person');
            $table->string('manager');
            $table->string('technical_person');
            $table->string('date_of_start');
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
        Schema::dropIfExists('clients');
    }
};
