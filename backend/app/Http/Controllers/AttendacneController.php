<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendacneController extends Controller
{
    
    public function uploadExcelFile(Request $request)
    {
        return ($request->file());
        $validator= \Validator::make($request,[
            'employee_attendance'=>'required|max:50000|mimes:xlsx,application/csv,application/excel,
             application/vnd.ms-excel, application/vnd.msexcel,
             text/csv,
             text/comma-separated-values,
             inode/x-empty,
             application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
         
          ]);

          if ($validator->fails()) {
            $response = [
                'status' => 'false',
                'message'=> 'Failed to upload file',
                'data' =>  [],
                'errors' => $validator,
            ];

            return  $response;
          }
    }
}
