<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmphistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emphistory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('application_date')->default('00-00-0000');
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('best_time_to_call')->nullable();
            $table->string('street1')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('position')->nullable();
            $table->string('days_available')->nullable();
            $table->longText('license')->nullable();
            $table->longText('need_call')->nullable();
            $table->string('resume')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emphistory');
    }
}
