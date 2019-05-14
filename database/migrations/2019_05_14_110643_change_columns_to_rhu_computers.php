<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsToRhuComputers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rhu_computers', function (Blueprint $table) {
            $table->string('municipality')->nullable()->change();
            $table->string('rhu')->nullable()->change();
            $table->string('owned_by')->nullable()->change();
            $table->string('property_no')->nullable()->change();
            $table->string('type')->nullable()->change();
            $table->string('spec')->nullable()->change();
            $table->string('ram')->nullable()->change();
            $table->string('hdd')->nullable()->change();
            $table->string('os')->nullable()->change();
            $table->string('location')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->date('wah_adoption')->nullable()->change();
            $table->date('date_acquired')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rhu_computers', function (Blueprint $table) {
            //
        });
    }
}
