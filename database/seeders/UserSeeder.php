<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $u=new user();
       $u->name = "Cristian";
       $u->email = "Cristian@gmail.com";
       $u->password = Hash::make("123456");
       $u->save();
    }
}

