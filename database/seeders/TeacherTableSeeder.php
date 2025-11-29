<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('teacher')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'contact_no' => $faker->phoneNumber,
                'password' => Hash::make('password123'),
                'subject' => $faker->randomElement(['Math', 'English', 'Science', 'History', 'PE', 'Art', 'Music']),
                'hire_date' => $faker->date(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
