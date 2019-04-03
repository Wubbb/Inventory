<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prop#');
            $table->string('type');
            $table->text('item_name');
            $table->date('date_procured');
            $table->date('date_acquired');
            $table->string('cost');
            $table->integer('salvage_value');
            $table->integer('life_span');
            $table->integer('age')->nullable();
            $table->date('disposed_date')->nullable();
            $table->string('disposed_method')->nullable();
            $table->string('remarks')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('items');
    }
}
