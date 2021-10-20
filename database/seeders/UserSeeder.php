<?php

namespace Database\Seeders;

use App\Models\Tarefa;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
        ->count(50)
        ->create();
    }
}