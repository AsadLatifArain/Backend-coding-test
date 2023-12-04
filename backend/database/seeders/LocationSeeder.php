<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
use Carbon\Carbon;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::truncate();
        
        $locations = [
            ['name'=>'Location 1', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['name'=>'Location 2', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['name'=>'Location 3', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['name'=>'Location 4', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
        ];

        Location::insert($locations);
    }
}
