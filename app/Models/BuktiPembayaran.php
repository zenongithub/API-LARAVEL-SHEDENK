<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'bukti_pembayaran';

    protected $fillable = ['id_antrian', 'nama_pembayaran'];

    public $timestamps = false;
}
