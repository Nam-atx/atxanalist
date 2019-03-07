<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtracolumnsToClientTable extends Migration
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
            $table->string('dnd_user')->nullable()->default(0);
            $table->string('portal')->nullable()->default(0);
            $table->string('profile')->nullable()->default(0);
            $table->string('start_date')->nullable()->default(0);
            $table->string('subject')->nullable()->default(0);
            $table->string('weblink')->nullable()->default(0);
            $table->string('atxclient_user')->nullable()->default(0);
            $table->string('updaterequired_user')->nullable()->default(0);
            
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
            $table->dropColumn('dnd_user');
            $table->dropColumn('portal');
            $table->dropColumn('profile');
            $table->dropColumn('start_date');
            $table->dropColumn('subject');
            $table->dropColumn('weblink');
            $table->dropColumn('atxclient_user');
            $table->dropColumn('updaterequired_user');
        });
    }
}
