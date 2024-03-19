<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabel_satuan_barang')->insert([
            ['kode' => 'kg', 'nama' => 'Kilogram'],
            ['kode' => 'm', 'nama' => 'Meter'],
            ['kode' => 'l', 'nama' => 'Liter'],
        ]);
    }
}
