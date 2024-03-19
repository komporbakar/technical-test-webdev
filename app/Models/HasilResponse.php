<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilResponse extends Model
{
    use HasFactory;

    protected $table = 'tabel_hasil_response';

    protected $fillable = [
        'jeniskelamin',
        'nama',
        'nama_jalan',
        'email',
        'angka_kurang',
        'angka_lebih',
        'profesi',
        'plain_json',
    ];

    public $timestamps = false;

    public function jenis_kelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jeniskelamin', 'kode');
    }

    public function profesi()
    {
        return $this->belongsTo(Profesi::class, 'profesi', 'kode');
    }
}
