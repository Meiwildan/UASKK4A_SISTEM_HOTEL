<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable =[
        'username', 'no_kamar', 'jenis_kamar', 'deskripsi_kamar'
    ];
}

