<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;
    protected $table = 'tipe';

    
    public function kategori()
    {
        return $this->hasMany(Kategori::class, 'tipe_id');
    }
    protected $fillable = [
        'nama_tipe',
    ];
}
