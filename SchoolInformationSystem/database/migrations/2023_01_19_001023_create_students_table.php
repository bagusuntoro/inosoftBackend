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
            $collection->embedsMany([
                'matakuliah' => [
                    'namaMK' => [],
                    'LT1' => [],
                    'LT2' => [],
                    'LT3' => [],
                    'LT4' => [],
                    'UH1' => [],
                    'UH2' => [],
                    'UTS' => [],
                    'UAS' => [],
                    'nilai' => []
                ],
            ]);
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
