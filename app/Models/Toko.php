<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $fillable=[
        'id', 'Nama', 'Alamat', 'No_Telepon', 'Nama_Toko', 'Email', 'Password', 'Cover'
    ];
}
