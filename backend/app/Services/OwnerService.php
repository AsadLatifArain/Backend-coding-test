<?php

namespace App\Services;

class OwnerService {

    public function groupByOwnerService()
    {
        $array = [
            'insurance.txt'=> 'company A',
            'letter.docx'=> 'company A',
            'contract.docx'=> 'company B'
        ];

        $groupByOwnerService = [];
        foreach($array as $key => $value)
        {
            if(!isset($groupByOwnerService[$value][0]))
            {
                $groupByOwnerService[$value][0] = $key;
            }
            else
            {
                $groupByOwnerService[$value][] = $key;
            }
        }

        return $groupByOwnerService;
    }
}
?>