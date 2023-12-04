<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Manager;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        Employee::truncate();
        Manager::truncate();

        User::factory(6)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $Users = User::all();

        foreach($Users as $key=>$value)
        {
            if($key < 3)
            {
                $Employee = $value->Employee()->create([
                            'first_name' => fake()->name(),
                            'last_name' => fake()->name(),
                            'age' => rand(1,60),
                            'designation' => 'developer',
                            'company_id' => 1
                        ]);

                $Employee->Schedule()->create([
                    'name' => 'schedule '.($key+1),
                    'shift_id' => rand(1,6),
                    'location_id' => 1,
                ]);
            }
            else
            {
                $value->Manager()->create([
                    'first_name' => fake()->name(),
                    'last_name' => fake()->name(),
                    'age' => rand(1,60),
                    'designation' => 'Manager',
                    'company_id' => 1
                ]); 
            }
        }
    }
}
