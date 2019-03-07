<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client', function (Blueprint $table) {
            //
            $table->string('dnd')->nullable()->default(0);
            $table->string('dnd_date')->nullable()->default(0);
            $table->string('atxclient')->nullable()->default(0);
            $table->string('atxclient_date')->nullable()->default(0);
            $table->string('followup_date')->nullable()->default(0);
            $table->string('followup_user')->nullable()->default(0);
            $table->string('update_required')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client', function (Blueprint $table) {
            //
            $table->dropColumn('dnd');
            $table->dropColumn('dnd_date');
            $table->dropColumn('atxclient');
            $table->dropColumn('atxclient_date');
            $table->dropColumn('followup_date');
            $table->dropColumn('followup_user');
            $table->dropColumn('update_required');
        });
    }
}
