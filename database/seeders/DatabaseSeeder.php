<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tarefa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            $user = User::factory()->create();

            $task = Tarefa::factory()->make();

            $user -> task()->create($task->toarray());
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}