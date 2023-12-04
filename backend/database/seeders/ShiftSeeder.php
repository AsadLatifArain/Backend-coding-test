<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shift;
use Carbon\Carbon;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shift::truncate();

        $data = [
            ['shift_name'=>'shift 1',    'start_time'=>'9:00 AM',   'end_time'=>'6.00 PM',  'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(), ],
            ['shift_name'=>'shift 2',    'start_time'=>'12:00 PM',  'end_time'=>'9.00 PM',  'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(), ],
            ['shift_name'=>'shift 3',    'start_time'=>'3.00 PM',   'end_time'=>'12.00 AM', 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(), ],
            ['shift_name'=>'shift 4',    'start_time'=>'6:00 PM',   'end_time'=>'3.00 AM',  'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(), ],
            ['shift_name'=>'shift 5',    'start_time'=>'9:00 PM',   'end_time'=>'6.00 AM',  'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(), ],
            ['shift_name'=>'shift 6',    'start_time'=>'12:00 AM',  'end_time'=>'9.00 AM',  'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(), ],
        ];

        Shift::insert($data);
    }
}
