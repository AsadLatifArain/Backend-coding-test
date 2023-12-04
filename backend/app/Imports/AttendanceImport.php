<?php

namespace App\Imports;

use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceImport implements ToModel, WithHeadingRow
{
    private $User;
    public function __construct()
    {
        $this->User = User::all();
    }

    public function model(array $row)
    {
        $User = $this->User->where('email', $row['email'])->first();
        
        if($User)
        {
            $EmployeeId = $User->Employee->id;
            $ScheduleId = $User->Employee->Schedule->id;
        }

        return new Attendance([
            'employee_id' => $EmployeeId??0,
            'schedule_id' => $ScheduleId??0,
            'date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']))->format('Y-m-d'),
            'checkin_time' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['checkin']))->format('H:i:s'),
            'checkout_time' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['checkout']))->format('H:i:s'),
        ]);
    }
}
