<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::insert([
            [
                'title' => 'Preparar reporte mensual',
                'description' => 'Reporte financiero del mes',
                'category_id' => 1,
                'user_id' => 1,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Estudiar Laravel API',
                'description' => 'Repasar apiResource y Sanctum',
                'category_id' => 2,
                'user_id' => 1,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Comprar víveres',
                'description' => 'Supermercado del fin de semana',
                'category_id' => 3,
                'user_id' => 1,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Enviar proyecto final',
                'description' => 'Subir a GitHub y enviar link',
                'category_id' => 4,
                'user_id' => 1,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Corregir bugs',
                'description' => 'Revisar validaciones',
                'category_id' => 1,
                'user_id' => 2,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Documentar API',
                'description' => 'Endpoints y ejemplos',
                'category_id' => 1,
                'user_id' => 2,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Estudiar Angular',
                'description' => 'Components y services',
                'category_id' => 2,
                'user_id' => 2,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ordenar escritorio',
                'description' => null,
                'category_id' => 3,
                'user_id' => 1,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Preparar presentación',
                'description' => 'Slides para reunión',
                'category_id' => 1,
                'user_id' => 2,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Respaldar base de datos',
                'description' => 'Backup semanal',
                'category_id' => 4,
                'user_id' => 2,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
