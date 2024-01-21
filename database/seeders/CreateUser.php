<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => env('APP_USER_EMAIL'),
        ], [
            'name' => 'admin',
            'email_verified_at' => Date::now(),
            'email' => env('APP_USER_EMAIL'),
            'password' => Hash::make(env('APP_USER_PASSWORD')),
            'active' => 1
        ]);
    }
}
