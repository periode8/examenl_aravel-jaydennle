<?php

namespace Database\Seeders;

use Database\Factories\TasksFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TasksFactory::factory()->times(10)->create();
    }
}
