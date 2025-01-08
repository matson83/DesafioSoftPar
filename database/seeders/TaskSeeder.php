<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User; // Importa o modelo User se necessário
use App\Models\Task; // Importa o modelo Task se necessário

class TaskSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $users = User::all();
        $admin = User::where('usertype', 'admin')->first();

        // Gera 20 tarefas
        for ($i = 0; $i < 20; $i++) {
            Task::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => $faker->randomElement(['Concluída', 'Em andamento', 'Espera']),
                'classification' => $faker->randomElement(['Feat', 'Bug']),
                'estimated_hours' => $faker->numberBetween(1, 20),
                'horas_gastas' => $faker->numberBetween(0, 20),
                'user_id' => $users->random()->id,
                'admin_id' => $admin->id,
            ]);
        }
    }
}
