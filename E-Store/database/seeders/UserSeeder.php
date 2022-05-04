<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        DB::table('users')->insert([
           'name'=>'Golibjon Temirov',
            'email'=>'yohocx@gmail.com',
            'password'=>Hash::make('12345'),
            'is_admin'=>1
        ]);
        DB::table('users')->insert([
            'name'=>'Faz',
            'email'=>'whitefox@gmail.com',
            'password'=>Hash::make('12345'),
            'is_admin'=>0
        ]);
    }
}
