<?php

namespace Database\Seeders;

use App\Models\CondicionIva;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondicionIvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CondicionIva::create([
            'codigo' => 1,
            'condicion_iva' => 'condicion iva prueba 1',
            'alicuota' => 12.300
        ]);
    }
}
