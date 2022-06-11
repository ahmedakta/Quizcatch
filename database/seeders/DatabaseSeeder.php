<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
             'user_name' => 'ahmed',
             'email'=> 'ahmed@gmail.com',
             'password' => '$2y$10$c8vEZwYV.gRnTqvE6ipLPuIbNZC/e5Q/eWlsM5xeH9tPhNIxO8npS', // asdasdasd
         ]);
         \App\Models\User::create([
            'name' => 'abuhmed',
            'user_name'=>'abuhmed',
            'email'=> 'abuhmed@gmail.com',
            'password' => '$2y$10$c8vEZwYV.gRnTqvE6ipLPuIbNZC/e5Q/eWlsM5xeH9tPhNIxO8npS', // asdasdasd
        ]);
        \App\Models\Profile::create([
            'id' => '1',
            'user_id'=> '1',
            'phone_number'=> '41232141',
            'about'=> 'i am ahmed i am using quizcatch',
            'gender'=> 'Male',
            'photo'=> 'media/photo.jpeg',
            'date_of_birth'=> '10.10.2000',
            'education'=> '',
        ]);
        \App\Models\Profile::create([
            'id' => '2',
            'user_id'=> '2',
            'phone_number'=> '41232141',
            'about'=> 'i am abuhmed i am using quizcatch',
            'gender'=> 'Male',
            'photo'=> 'media/photo2.jpeg',
            'date_of_birth'=> '10.10.2000',
            'education'=> '',
        ]);
        // App\Models\Post::factory()->count(30)->create();
        // App\Models\Quiz::factory()->count(30)->create();
        \App\Models\User::factory()->count(10)->create();
        \App\Models\Quiz::factory()->count(30)->create(['slug'=>'something']);
        \App\Models\Post::factory()->count(10)->create();
        \App\Models\Question::factory()->count(10)->create(['quiz_id'=>1]);
        // factory(App\Model\User::class, 50)->create();
        // factory(App\Model\Post::class, 50)->create();
        // factory(App\Models\Post::class, 50)->create();
        // factory(App\Models\Quiz::class, 50)->create();
    }
}
