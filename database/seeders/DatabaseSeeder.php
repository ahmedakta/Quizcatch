<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
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
             'email'=> 'ahmdekta@gmail.com',
             'role'=> 1,
             'password' => '$2y$10$k7a7O1WrOa3abqqiIfS8TObCHDpdPxulthyR0nXZz4yGjGzAdC0xe',
         ]);
        \App\Models\Profile::create([
            'id' => '1',
            'user_id'=> '1',
            'phone_number'=> '',
            'about'=> 'i am ahmed i am using quizcatch',
            'gender'=> 'Male',
            'photo'=> 'media/photo.jpeg',
            'date_of_birth'=> '17.08.2003',
            'education'=> 'sabahattin zaim university',
        ]);
    }
}
