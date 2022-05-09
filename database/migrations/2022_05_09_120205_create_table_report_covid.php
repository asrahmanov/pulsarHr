<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReportCovid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_covid', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->date('report_day')->nullable();
            $table->integer('n_1')->unsigned();
            $table->integer('n_2')->unsigned();
            $table->integer('n_3')->unsigned();
            $table->integer('n_4')->unsigned();
            $table->integer('n_5')->unsigned();
            $table->integer('n_6')->unsigned();
            $table->integer('n_7')->unsigned();
            $table->integer('n_8')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('report_covid');
    }
}
