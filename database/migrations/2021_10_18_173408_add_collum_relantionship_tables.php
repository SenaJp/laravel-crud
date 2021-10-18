<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumRelantionshipTables extends Migration
{
    public function up()
    {
        Schema::table('task_lists', function(blueprint $table) {
        $table->foreignId('user_id')->after('id');
        $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('task_lists', function(Blueprint $table) {
            $table->dropForeign('task_lists_user_id_foreign');
            $table->dropcolumn('user_id');
        });
    }
}
