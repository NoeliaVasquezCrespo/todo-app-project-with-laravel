<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTaskSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tag_task')->insert([
            ['task_id' => 1, 'tag_id' => 1],
            ['task_id' => 1, 'tag_id' => 2],
            ['task_id' => 2, 'tag_id' => 4],
            ['task_id' => 3, 'tag_id' => 3],
            ['task_id' => 4, 'tag_id' => 1],
            ['task_id' => 5, 'tag_id' => 2],
            ['task_id' => 6, 'tag_id' => 4],
            ['task_id' => 7, 'tag_id' => 4],
            ['task_id' => 8, 'tag_id' => 3],
            ['task_id' => 9, 'tag_id' => 2],
        ]);
    }
}
