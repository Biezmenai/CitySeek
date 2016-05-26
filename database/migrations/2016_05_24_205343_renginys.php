<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Renginys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renginys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('aprasymas');
            $table->string('pradzios_data');
            $table->string('pabaigos_data');
            $table->string('likes_laikas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('renginys');
    }
}
