<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OwnerService;

class OwnerController extends Controller
{
    protected $ownerService;

    public function __construct(OwnerService $ownerService)
    {
        $this->ownerService = $ownerService;
    }

    public function getGroupByOwnerService()
    {
        return $this->ownerService->groupByOwnerService();    
    }
}
