<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getElementCount(Request $request)
    {
        $array = [1,2,3,4,4,5,3];
        $duplicateValues = [];

       foreach($array as $key => $value)
       {
            $tempArr = $array;
            unset($tempArr[$key]);

            if(in_array($value, $tempArr))
            {
                $duplicateValues[$value] = $value;
            }  
       }

       return array_values($duplicateValues);
    }
}
