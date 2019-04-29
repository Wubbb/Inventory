<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechbagItenerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('techbag_itenerary', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');
            $table->string('training')->nullable();
            $table->string('purpose')->nullable();
            $table->date('date_out')->nullable();
            $table->date('date_in')->nullable();


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
        Schema::dropIfExists('techbag_itenerary');
    }
}
