<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name'=>'Bigger',
            'description'=>'Best burger in multiuniverses',
            'brand'=>'LOOOK',
            'price'=>20000,
            'photo'=>'bigger.jpg'
        ]);
        DB::table('products')->insert([
            'name'=>'Steam Deck',
            'description'=>'Mobile Gaming Console',
            'brand'=>'Valve Corp',
            'price'=>9000000,
            'photo'=>'steamdeck.jpg'
        ]);
        DB::table('products')->insert([
            'name'=>'Yamaha Pacific A012',
            'description'=>'Electric guitar by one of the best companies',
            'brand'=>'Yamaha',
            'price'=>6500000,
            'photo'=>'yamaha.jpg'
        ]);
        DB::table('products')->insert([
            'name'=>'SteelSeries Rival710 Gaming Mouse',
            'description'=>'Gaming Mouse by bran SteelSeries',
            'brand'=>'SteelSeries',
            'price'=>1100000,
            'photo'=>'rival710.jpg'
        ]);
        DB::table('products')->insert([
            'name'=>'Juggernaut DOTA 2 Statue',
            'description'=>'Statuse of character Juggernaut from DOTA 2',
            'brand'=>'Valve Corp',
            'price'=>400000,
            'photo'=>'juggernaut.jpg'
        ]);
    }
}
