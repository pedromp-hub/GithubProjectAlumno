<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulos = [
            ['nombre' => 'Desarrollo web en entorno servidor', 'abreviatura' => 'dwes', 'horas' => 7, 'creditos' => 12],
            ['nombre' => 'Optativa', 'abreviatura' => 'opt', 'horas' => 3, 'creditos' => 2],
        ];
        foreach($modulos as $modulo) {
            Modulo::create($modulo);
        }
    }
}
