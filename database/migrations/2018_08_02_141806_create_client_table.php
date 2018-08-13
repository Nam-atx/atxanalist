<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('contact');
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('email')->unique();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('requirement')->nullable();
            $table->string('status');
            $table->date('opening_date');
            $table->string('longitude');
            $table->string('latitude');
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
        Schema::dropIfExists('client');
    }
}
