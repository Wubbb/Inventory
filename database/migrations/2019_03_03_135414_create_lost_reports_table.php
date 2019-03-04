<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->text('last_used_by');
            $table->time('disposed_date');
            $table->text('reason');
            $table->text('remarks');
            $table->integer('reports_id');
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
        Schema::dropIfExists('lost_reports');
    }
}
