<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienthistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clienthistory', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('designation')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('contact_1')->nullable();
            $table->string('designation_1')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('email_1')->nullable();

            $table->string('contact_2')->nullable();
            $table->string('designation_2')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email_2')->nullable();

            $table->string('fax')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
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
        Schema::dropIfExists('clienthistory');
    }
}
