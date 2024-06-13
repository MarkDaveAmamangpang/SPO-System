<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'firstname' => 'John',
            'middlename' => 'A',
            'lastname' => 'Doe',
            'idnumber' => 'ID123456',
            'suffix' => 'Jr.',
            'sex' => 'Male',
            'user_type' => 'admin',
            'birthdate' => '1990-01-01',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password'),
            'profile_picture' => 'path/to/profile1.jpg',
            'lastlogin' => Carbon::now(),
            'archived_at' => null,
        ]);

        User::factory()->create([
            'firstname' => 'Jane',
            'middlename' => 'B',
            'lastname' => 'Smith',
            'idnumber' => 'ID654321',
            'suffix' => '',
            'sex' => 'Female',
            'user_type' => 'player',
            'birthdate' => '1992-02-02',
            'email' => 'jane.smith@example.com',
            'password' => Hash::make('password'),
            'profile_picture' => 'path/to/profile2.jpg',
            'lastlogin' => Carbon::now(),
            'archived_at' => null,
        ]);

        User::factory()->create([
            'firstname' => 'Alice',
            'middlename' => 'C',
            'lastname' => 'Johnson',
            'idnumber' => 'ID789012',
            'suffix' => '',
            'sex' => 'Female',
            'user_type' => 'coach',
            'birthdate' => '1988-03-03',
            'email' => 'alice.johnson@example.com',
            'password' => Hash::make('password'),
            'profile_picture' => 'path/to/profile3.jpg',
            'lastlogin' => Carbon::now(),
            'archived_at' => null,
        ]);

        User::factory()->create([
            'firstname' => 'Bob',
            'middlename' => 'D',
            'lastname' => 'Brown',
            'idnumber' => 'ID345678',
            'suffix' => 'Sr.',
            'sex' => 'Male',
            'user_type' => 'admin',
            'birthdate' => '1985-04-04',
            'email' => 'bob.brown@example.com',
            'password' => Hash::make('password'),
            'profile_picture' => 'path/to/profile4.jpg',
            'lastlogin' => Carbon::now(),
            'archived_at' => null,
        ]);

        User::factory()->create([
            'firstname' => 'Charlie',
            'middlename' => 'E',
            'lastname' => 'Davis',
            'idnumber' => 'ID567890',
            'suffix' => '',
            'sex' => 'Male',
            'user_type' => 'player',
            'birthdate' => '1995-05-05',
            'email' => 'charlie.davis@example.com',
            'password' => Hash::make('password'),
            'profile_picture' => 'path/to/profile5.jpg',
            'lastlogin' => Carbon::now(),
            'archived_at' => null,
        ]);

        User::factory()->create([
            'firstname' => 'Diana',
            'middlename' => 'F',
            'lastname' => 'Evans',
            'idnumber' => 'ID678901',
            'suffix' => '',
            'sex' => 'Female',
            'user_type' => 'coach',
            'birthdate' => '1991-06-06',
            'email' => 'diana.evans@example.com',
            'password' => Hash::make('password'),
            'profile_picture' => 'path/to/profile6.jpg',
            'lastlogin' => Carbon::now(),
            'archived_at' => null,
        ]);
    }
}

