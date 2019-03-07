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
            $table->string('designation');
            $table->string('phone');
            $table->string('email')->unique();

            $table->string('contact_1');
            $table->string('designation_1');
            $table->string('phone_1');
            $table->string('email_1');

            $table->string('contact_2');
            $table->string('designation_2');
            $table->string('phone_2');
            $table->string('email_2');

            $table->string('fax')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('requirement')->nullable();
            $table->string('status')->nullable();
            $table->date('opening_date')->nullable();
            $table->string('longitude')->default(0);
            $table->string('latitude')->default(0);
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
