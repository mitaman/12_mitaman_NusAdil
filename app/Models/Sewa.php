<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $table = 'sewa';
    protected $fillable = [
        'id',
        'user_id',
        'pengacara_id',
        'start_date',
        'end_date',
        'katekogori_kasus_id',
        'deskripsi_kasus',
        'fee',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengacara()
    {
        return $this->belongsTo(Pengacara::class);
    }

    public function kategoriKasus()
    {
        return $this->belongsTo(KategoriKasus::class, 'katekogori_kasus_id');
    }
}
