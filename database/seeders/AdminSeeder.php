<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@gmail.com')->first();
        if (is_null($user)) {
            $user = new User(); 
            $user->user_id = "100";
            $user->name = "Admin";
            $user->email = "admin@gmail.com";
            $user->password = Hash::make("12345678");
            $user->save();
        }
    }
}
