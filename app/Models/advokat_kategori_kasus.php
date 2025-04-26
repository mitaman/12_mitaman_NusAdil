<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class advokat_kategori_kasus extends Model
{
    protected $table = 'advokat_kategori_kasus';
    protected $fillable = [
        'id',
        'advokat_id',
        'kategori_kasus_id',
    ];

    public function sewa()
    {
        return $this->belongsTo(Sewa::class);
    }

    public function kategoriKasus()
    {
        return $this->belongsTo(KategoriKasus::class);
    }
}
