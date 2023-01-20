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
        'name',
        'kelas',
        'latihan1',
        'latihan2',
        'latihan3',
        'latihan4',
        'ulanganHarian1',
        'ulanganHarian2',
        'uts',
        'uas',
        'nilai'
    ];
}
