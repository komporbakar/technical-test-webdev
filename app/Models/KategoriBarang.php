<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $table = 'tabel_kategori_barang';

    protected $fillable = ['kode', 'nama'];

    public $timestamps = false;

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'nama', 'kode');
    }
}
