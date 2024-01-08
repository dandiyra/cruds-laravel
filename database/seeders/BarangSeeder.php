<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_barang' => 'Laptop',
                'harga_barang' => '1.000.000'
            ],
            [
                'nama_barang' => 'PC',
                'harga_barang' => '2.000.000'
            ],
        ];
        foreach ($data as $key) {
            DB::table('barangs')->insert($key);
        }
    }
}
