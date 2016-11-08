<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('start_score');
            $table->integer('end_score');
            $table->string('rank');
            $table->string('badge');
            $table->integer('size');
            $table->timestamps();
        });

        for ($i=0;$i<28;$i++) {
            DB::table('ranks')->insert(
                array(
                    'rank' => 'Rangas',
                    'badge' => "/images/thumbs/ranks/"+($i+1)+".png",
                    'size' => 32+$i,
                    'start_score' => $i*50,
                    'end_score' => ($i+1)*50-1
                )
            );
        }
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
