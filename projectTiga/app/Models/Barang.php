<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    protected $fileable=[
        'name',
        'price',
        'stock',
        'description',
        'image'
    ];
}
