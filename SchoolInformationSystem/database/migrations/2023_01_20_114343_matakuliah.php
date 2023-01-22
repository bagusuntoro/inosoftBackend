<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matakuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('matakuliah', function ($collection) {
            $collection->id();
            $collection->string('namaMK');
            $collection->integer('LT1');
            $collection->integer('LT2');
            $collection->integer('LT3');
            $collection->integer('LT4');
            $collection->integer('UH1');
            $collection->integer('UH2');
            $collection->integer('UTS');
            $collection->integer('UAS');
            $collection->integer('nilai');
            $collection->string('mahasiswa_id');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliah');
    }
}
