<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Trabajo',
                'description' => 'Tareas relacionadas al trabajo',
                'color' => '#1976D2',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Estudio',
                'description' => 'Tareas de estudio y aprendizaje',
                'color' => '#388E3C',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Personal',
                'description' => 'Tareas personales',
                'color' => '#F57C00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Urgente',
                'description' => 'Tareas urgentes',
                'color' => '#D32F2F',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
