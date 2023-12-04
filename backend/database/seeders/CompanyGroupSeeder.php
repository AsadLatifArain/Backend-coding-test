<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyGroup;
use Carbon\Carbon;

class CompanyGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyGroup::truncate();

        $companyGroup = [
            ['name'=>'group 1', 'company_group_id'=>null, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['name'=>'group 2', 'company_group_id'=>null, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['name'=>'sub group 1', 'company_group_id'=>2, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['name'=>'sub group 2', 'company_group_id'=>1, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
        ];

        CompanyGroup::insert($companyGroup);
    }
}
