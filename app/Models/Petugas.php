<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_petugas';
    protected $table = 'petugas';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level',
        'foto',
        'gender',
        'tgl_lahir'
    ];
    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id_petugas', 'id_petugas');
    }
}
