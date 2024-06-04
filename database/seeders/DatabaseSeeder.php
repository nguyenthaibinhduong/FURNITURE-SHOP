<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   //admin 
        $this->call([
            UserSeeder::class,
        ]);
        // OrderStatus 
        $this->call([
            StatusSeeder::class,
        ]);
    }
}
