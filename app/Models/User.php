<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'akuns';

    protected $fillable = ['id_akun','nama', 'password'];

    public $timestamps = false;
}
