<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use function ucfirst;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "first_name" => "Isreal",
            "last_name" => "Ekanem",
            "email" => "equalaccess@safeschool.org",
            "phone_number" => "+2347037671809",
            "password" => bcrypt("password"),
            "gender" => ucfirst('male'),
            "position" => ucfirst('chairman'),
            "state" => "Aks",
            "village" => ucfirst('ikot Ekpene'),
            "services" => "Admin",
            "ward" => 1,
            "unit" => ucfirst('ebong'),
            "disability" => "No"
        ]);
    }
}
