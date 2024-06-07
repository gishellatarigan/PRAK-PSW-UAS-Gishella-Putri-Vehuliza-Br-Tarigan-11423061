<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $fillable = [
        'name', 'email', 'phone', 'address', 
    ];

    public function pengelola()
    {
        return $this->hasOne(Pengelola::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}

