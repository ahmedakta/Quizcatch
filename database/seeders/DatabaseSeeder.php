<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::create([
             'name' => 'ahmed',
             'email'=> 'ahmed@gmail.com',
             'password' => '$2y$10$c8vEZwYV.gRnTqvE6ipLPuIbNZC/e5Q/eWlsM5xeH9tPhNIxO8npS', // asdasdasd
         ]);
    }
}
