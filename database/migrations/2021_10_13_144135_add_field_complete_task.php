<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldCompleteTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_lists', function (Blueprint $table) {
            $table
                ->boolean('complete')
                ->default('false');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_lists', function (Blueprint $table) {
            $table->dropColumn('complete');
        });
    }
}
