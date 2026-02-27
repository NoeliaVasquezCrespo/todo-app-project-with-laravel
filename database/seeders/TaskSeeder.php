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
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Estudiar Laravel API',
                'description' => 'Repasar apiResource y Sanctum',
                'category_id' => 2,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Comprar víveres',
                'description' => 'Supermercado del fin de semana',
                'category_id' => 3,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Enviar proyecto final',
                'description' => 'Subir a GitHub y enviar link',
                'category_id' => 4,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Corregir bugs',
                'description' => 'Revisar validaciones',
                'category_id' => 1,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Documentar API',
                'description' => 'Endpoints y ejemplos',
                'category_id' => 1,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Estudiar Angular',
                'description' => 'Components y services',
                'category_id' => 2,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ordenar escritorio',
                'description' => null,
                'category_id' => 3,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Preparar presentación',
                'description' => 'Slides para reunión',
                'category_id' => 1,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Respaldar base de datos',
                'description' => 'Backup semanal',
                'category_id' => 4,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Revisar correos pendientes',
                'description' => 'Responder emails importantes',
                'category_id' => 1,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Practicar entrevistas técnicas',
                'description' => 'Preguntas de React y Laravel',
                'category_id' => 2,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Hacer ejercicio',
                'description' => 'Rutina de 30 minutos',
                'category_id' => 3,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Actualizar dependencias',
                'description' => 'Composer y npm update',
                'category_id' => 1,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Leer documentación de Sanctum',
                'description' => 'Revisar autenticación por tokens',
                'category_id' => 2,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Planificar semana',
                'description' => 'Organizar tareas y prioridades',
                'category_id' => 3,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Optimizar consultas',
                'description' => 'Revisar eager loading',
                'category_id' => 1,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Crear tests unitarios',
                'description' => 'Cobertura básica de API',
                'category_id' => 2,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Organizar archivos del proyecto',
                'description' => 'Eliminar archivos innecesarios',
                'category_id' => 3,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Configurar entorno producción',
                'description' => 'Variables de entorno y permisos',
                'category_id' => 4,
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
