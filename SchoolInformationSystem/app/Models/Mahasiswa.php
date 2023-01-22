<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $collection = 'mahasiswa';

    protected $fillable = ['nama', 'umur', 'kelas_id'];

}
