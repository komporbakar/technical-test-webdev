<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabel_jeniskelamin')->insert([
            ['kode' => 1, 'jenis_kelamin' => 'Laki-laki'],
            ['kode' => 2, 'jenis_kelamin' => 'Perempuan'],
        ]);
    }
}
