<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $users = [
        ["name" => "Adrián",
         "email" => "adrianponcecano@gmail.com",
         "password" => "$2y$12\$zfEff/v5GKvrbv6.iln3/uI5Y0AbhUf.UHCZhdKwNIZ3A3YBb0CwS",
        ]
      ];

      foreach ($users as $user) {
        User::create($user);
      }
    }
}
