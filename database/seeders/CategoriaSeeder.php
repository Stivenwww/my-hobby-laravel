<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria')->insert([
            [
                'id' => 1,
                'nombre' => 'Nike Elite Basketball Socks',
                'descripcion' => 'Calcetines de compresión con acolchado para mayor soporte y transpirabilidad.',
                'created_at' => '2025-05-03 10:32:00',
                'updated_at' => '2025-05-03 10:32:00',
            ],
            [
                'id' => 2,
                'nombre' => 'Wilson Evolution Basketball',
                'descripcion' => 'Balón oficial de entrenamiento con superficie de microfibra y alto agarre.',
                'created_at' => '2025-05-03 10:34:00',
                'updated_at' => '2025-05-03 10:34:00',
            ],
            [
                'id' => 3,
                'nombre' => 'Gatorade Squeeze Bottle',
                'descripcion' => 'Botella exprimible usada para hidratación rápida durante entrenamientos.',
                'created_at' => '2025-05-03 10:36:00',
                'updated_at' => '2025-05-03 10:36:00',
            ],
            [
                'id' => 4,
                'nombre' => 'Hyperice Hypervolt Massage Gun',
                'descripcion' => 'Pistola de masaje para recuperación muscular con múltiples niveles de presión.',
                'created_at' => '2025-05-03 10:38:00',
                'updated_at' => '2025-05-03 10:38:00',
            ],
            [
                'id' => 5,
                'nombre' => 'McDavid Knee Pads',
                'descripcion' => 'Rodilleras acolchadas para protección en entrenamientos y partidos.',
                'created_at' => '2025-05-03 10:40:00',
                'updated_at' => '2025-05-03 10:40:00',
            ],
        ]);
    }
}
