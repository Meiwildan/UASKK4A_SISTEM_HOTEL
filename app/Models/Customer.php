<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =[
        'nama', 'username', 'email', 'nohp', 'no_kamar', 'jenis_kamar'
    ];
}
