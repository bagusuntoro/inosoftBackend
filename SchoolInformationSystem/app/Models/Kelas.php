<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $collection = 'kelas';

    protected $fillable = ['prodi', 'kaprodi'];
}
