<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akuns';

    protected $fillable = ['id_akun','nama', 'email', 'password'];

    public $timestamps = false;

    protected $attributes = [
        'id_role' => 2
    ];
}
