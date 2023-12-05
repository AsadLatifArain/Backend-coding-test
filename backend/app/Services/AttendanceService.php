<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Employees;
use App\Models\User;
use Carbon\Carbon;

class AttendanceService {

    public function getAttendance()
    {
        $attendance = Attendance::all();

        $attendanceData = [];

        foreach($attendance as $attendance)
        {
            $checkin  = Carbon::parse($attendance->date.' '.$attendance->checkin_time);
            $checkout = Carbon::parse($attendance->date.' '.$attendance->checkout_time);
            

            $attendanceData[] = [
                
                'name' => $attendance->Employee->User->name,
                'checkin' =>  date( 'h:i:s A', strtotime($attendance->checkin_time)) ,
                'checkout' => date( 'h:i:s A', strtotime($attendance->checkout_time)),
                'working_hours' => $checkin->diffInHours($checkout)
            ]; 
        }

        return $attendanceData;
    }
}
?>