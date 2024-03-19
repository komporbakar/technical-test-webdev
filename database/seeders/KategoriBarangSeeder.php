<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabel_kategori_barang')->insert([
            ['kode' => 'kts', 'nama' => 'Kitchen Set'],
            ['kode' => 'bds', 'nama' => 'Bedroom set'],
            ['kode' => 'fms', 'nama' => 'Family room set'],
        ]);
    }
}
