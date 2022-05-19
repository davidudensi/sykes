<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seed 'locations' table
        DB::table('locations')->insert([
            'location_name' => 'Cornwall', 
        ]);
        DB::table('locations')->insert([
            'location_name' => 'Lake District', 
        ]);
        DB::table('locations')->insert([
            'location_name' => 'Yorkshire', 
        ]);
        DB::table('locations')->insert([
            'location_name' => 'Wales', 
        ]);
        DB::table('locations')->insert([
            'location_name' => 'Scotland', 
        ]);

        //Seed 'properties' table
        DB::table('properties')->insert([
            '_fk_location' => 1, 
            'property_name' => 'Sea View', 
            'near_beach' => 1, 
            'accepts_pets' => 1, 
            'sleeps' => 4, 
            'beds' => 2, 
        ]);
        DB::table('properties')->insert([
            '_fk_location' => 3, 
            'property_name' => 'Cosey', 
            'near_beach' => 0, 
            'accepts_pets' => 0, 
            'sleeps' => 6, 
            'beds' => 4, 
        ]);
        DB::table('properties')->insert([
            '_fk_location' => 5, 
            'property_name' => 'The Retreat', 
            'near_beach' => 1, 
            'accepts_pets' => 0, 
            'sleeps' => 2, 
            'beds' => 1, 
        ]);
        DB::table('properties')->insert([
            '_fk_location' => 5, 
            'property_name' => 'Coach House', 
            'near_beach' => 0, 
            'accepts_pets' => 1, 
            'sleeps' => 5, 
            'beds' => 3, 
        ]);
        DB::table('properties')->insert([
            '_fk_location' => 4, 
            'property_name' => 'Beach Cottage', 
            'near_beach' => 1, 
            'accepts_pets' => 1, 
            'sleeps' => 8, 
            'beds' => 6, 
        ]);

        //Seed 'bookings' table
        DB::table('bookings')->insert([
            '_fk_location' => 1, 
            'start_date' => '2020-08-26', 
            'end_date' => '2020-09-02',
        ]);
        DB::table('bookings')->insert([
            '_fk_location' => 1, 
            'start_date' => '2020-12-06', 
            'end_date' => '2020-12-13',
        ]);
    }
}
