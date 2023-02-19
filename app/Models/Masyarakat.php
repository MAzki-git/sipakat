<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasFactory;

    protected $guard = 'masyarakat';
    protected $table = 'masyarakats';
    protected $primarykey = 'nik';
    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'password',
        'telp'
    ];
}