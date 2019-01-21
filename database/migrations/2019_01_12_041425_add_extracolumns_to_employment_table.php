<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtracolumnsToEmploymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment', function (Blueprint $table) {
            //
            $table->string('atxemployee_user')->nullable()->default(0);
            $table->string('atxavailable')->nullable()->default(0);
            $table->string('atxavailable_date')->nullable()->default(0);
            $table->string('atxavailable_user')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employment', function (Blueprint $table) {
            //
        });
    }
}
