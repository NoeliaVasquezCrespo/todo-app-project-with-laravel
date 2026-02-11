<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        Tag::insert([
            [
                'name' => 'Urgente',
                'color' => '#D32F2F',
                'description' => 'Debe hacerse lo antes posible',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Importante',
                'color' => '#F57C00',
                'description' => 'Alta prioridad',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Opcional',
                'color' => '#1976D2',
                'description' => 'Puede postergarse',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rápida',
                'color' => '#388E3C',
                'description' => 'Se realiza en poco tiempo',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
