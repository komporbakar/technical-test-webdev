<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabel_profesi')->insert([
            ['kode' => 'A', 'profesi' => 'Petani'],
            ['kode' => 'B', 'profesi' => 'Teknisi'],
            ['kode' => 'C', 'profesi' => 'Guru'],
            ['kode' => 'D', 'profesi' => 'Nelayan'],
            ['kode' => 'E', 'profesi' => 'Seniman'],
        ]);
    }
}
