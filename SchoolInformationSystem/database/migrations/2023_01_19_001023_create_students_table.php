<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('students', function ($collection) {
            $collection->id();
            $collection->index('name');
            $collection->index('kelas');
            $collection->index('latihan1');
            $collection->index('latihan2');
            $collection->index('latihan3');
            $collection->index('latihan4');
            $collection->index('ulanganHarian1');
            $collection->index('ulanganHarian2');
            $collection->index('uts');
            $collection->index('uas');
            $collection->index('nilai');
            // $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
