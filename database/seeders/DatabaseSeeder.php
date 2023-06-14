<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DatabaseBarang::class);
        // $this->call(DatabasePesanan::class);
        // $this->call(Databasepengemasan::class);
    }
}
