<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
class AttendacneController extends Controller
{
    
  public function uploadExcelFile(Request $request)
  {

    
      $validator= \Validator::make($request->all(),[
          'employee_attendance'=>'required|max:50000|mimes:xlsx,application/csv,application/excel, application/vnd.ms-excel, application/vnd.msexcel,text/csv',
        ]);

        
      if ($validator->fails()) {
        $response = [
            'status' => false,
            'message'=> 'Failed to upload file',
            'data' =>  [],
            'errors' => $validator->errors(),
        ];

        return  $response;
      }

      Excel::import(new AttendanceImport, $request->file('employee_attendance'));
       
      $response = [
        'status' => true,
        'message' => 'Attendace file uploaded successfully',
        'data' => [],
        'errors' => [],
      ];
      return $response;
  }
}
