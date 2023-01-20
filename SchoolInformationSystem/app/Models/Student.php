<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $connection = 'mongodb';
    protected $collection = 'students';

    protected $fillable = [
        'name', 'kelas', 'matakuliah'
    ];
    protected $embeds = [
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
    ];
}
