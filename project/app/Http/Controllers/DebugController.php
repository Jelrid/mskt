<?php

namespace App\Http\Controllers;

use App\Services\EmployeeScheduleService;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    public function index(Request $request)
    {
                
        dd(EmployeeScheduleService::getDates(1,2024,2));
    }
}
