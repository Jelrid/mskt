<?php

namespace App\Http\Controllers;

use App\Models\EmployerPost;
use Illuminate\Http\Request;
use App\Models\Method;
use App\Models\Methodology;
//use App\Models\EmployeeSchedule;
use App\Models\ResearchSchedule;
use Inertia\Inertia;
use Inertia\Response;

use App\Services\EmployeeScheduleService;

class CreateExamController extends Controller
{
    public function index(Request $request)
    {

        return Inertia::render('CreateExam', [

            'methods' => Method::getActiveMethods()->get(),
            'methodology' => Methodology::getActiveMethodologies()->with('employees')->get(),
            'workTime' => ResearchSchedule::getActiveSchedule()->get(),
            'seansTime' => EmployerPost::getActiveTime()->get(),
        ]);
    }

    public function dates(Request $request) {
        $year= $request->get('year');
        $month= $request->get('month');
        $method = $request->get('method');
        $employee = $request->get('employee');

        return response()->json(EmployeeScheduleService::getDates($year, $month, $method, $employee));
    }
}
