<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            "fname" => "Angelic",
            "lname" => "Pangkaraya",
            "username" => "angeliicp",
            "email" => "sky.xii.a.4.angelic@gmail.com",
            "password" => "Tygo005$",
            "phone_no" => "0815717359872",
            "address" => "West Jakarta",
            "country" => "Indonesia",
            "role" => "Admin",
            "avatar" => "pfp1.jpg",
            "avatar_alt" => "Asian woman with a shoulder-length curly black hair, wearing a necklace and beige-colored blouse",
        ]);
        
        // User::create([
        //     "fname" => "Monica",
        //     "lname" => "Wijaya",
        //     "username" => "monicaw",
        //     "email" => "buyer@mail.com",
        //     "password" => "12345678",
        //     "phone_no" => "0815717383643",
        //     "address" => "West Jakarta",
        //     "country" => "Indonesia",
        //     "role" => "Buyer",
        //     "avatar" => "pfp2.jpg",
        //     "avatar_alt" => "Woman with a shoulder-length straight black hair, wearing glasses and white shirt and burgundy outer",
        // ]);
    }
}
