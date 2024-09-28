<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['kategori_id', 'total_biaya', 'tanggal_pemasukan'];
    protected $casts = [
        'tanggal_pemasukan' => 'datetime',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
}
