<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'tabel_jeniskelamin';

    protected $fillable = ['kode', 'jenis_kelamin'];

    public $timestamps = false;

    public function hasil_responses()
    {
        return $this->hasMany(HasilResponse::class, 'jeniskelamin', 'kode');
    }
}
