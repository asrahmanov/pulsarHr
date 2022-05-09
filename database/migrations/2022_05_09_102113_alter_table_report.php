<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report', function($table) {
            $table->dateTime('date_1')->nullable()->change();
            $table->dateTime('date_2')->nullable()->change();
            $table->dateTime('date_3')->nullable()->change();
            $table->dateTime('date_4')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
