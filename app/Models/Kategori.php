<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
    protected $fillable = [
        'nama_kategori',
        'tipe_id',
    ];
}
