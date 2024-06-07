<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import trait Authenticatable
use App\Models\Member; // Import model Member
use App\Models\Lokasi; // Import model Lokasi

class Pengelola extends Authenticatable
{
    protected $fillable = [
        'namaPengelola',
        'nomor_hp',
        'username',
        'password',
        'lokasi_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
