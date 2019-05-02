<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRhuComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rhu_computers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('municipality');
            $table->string('rhu');
            $table->string('owned_by');
            $table->string('property_no');
            $table->string('type');
            $table->string('spec');
            $table->string('ram');
            $table->string('hdd');
            $table->string('os');
            $table->string('location');
            $table->string('status');
            $table->date('wah_adoption');
            $table->date('date_acquired');
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
        Schema::dropIfExists('rhu_computers');
    }
}
