<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;
    protected $table = 'tipe';

    
    public function kategoris()
    {
        return $this->hasMany(Kategori::class);
    }
    protected $fillable = [
        'nama_tipe',
    ];
}
