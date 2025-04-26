<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengacara extends Model
{
    protected $table = 'pengacara';
    protected $fillable = [
        'user_id',
        'nia',
        'tanggal_lahir',
        'alamat',
        'alamat_kantor',
        'is_verified',
    ];
    
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sewa(){
        return $this->hasMany(Sewa::class);
    }
    
}
