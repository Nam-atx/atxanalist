<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtxemployeeToEmploymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employment', function (Blueprint $table) {
            $table->string('atxemployee')->nullable();
            $table->string('atxemployee_date')->nullable();
            $table->string('future_followup_date')->nullable();
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
            $table->dropColumn('atxemployee');
            $table->dropColumn('atxemployee_date');
            $table->dropColumn('future_followup_date');
        });
    }
}
