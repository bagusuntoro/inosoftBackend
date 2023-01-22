<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    

    protected $collection = 'matakuliah';
    protected $fillable = [
        'namaMK', 
        'LT1',
        'LT2',
        'LT3',
        'LT4',
        'UH1',
        'UH2',
        'UTS',
        'UAS',
        'nilai',
        'mahasiswa_id'
    ];
}