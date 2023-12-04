<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::truncate();
        
        $company = [
            ['company_name'=>'company 1', 'location_id'=>1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['company_name'=>'company 2', 'location_id'=>2, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
        ];

        Company::insert($company);
    }
}
