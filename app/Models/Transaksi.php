<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable =[
        'username', 'no_kamar', 'jenis_kamar', 'check_in', 'check_out', 'sub_total'
    ];
}
