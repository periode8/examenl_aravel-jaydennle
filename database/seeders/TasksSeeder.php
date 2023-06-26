<?php

namespace Database\Seeders;

use Database\Factories\TaskFactory;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskFactory::factory()->count(10)->create();
    }
}
