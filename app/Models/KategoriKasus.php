<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKasus extends Model
{
    protected $table = 'kategori_kasus';
    protected $fillable = [
        'id',
        'name',
    ];

    public function sewa()
    {
        return $this->hasMany(Sewa::class);
    }
}
