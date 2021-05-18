<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Report;


class ReportController extends Controller
{
    public function index()
    {
        $reports = Auth::user()->reports()->get();
        
        return view('auth.report', compact('reports'));
    }

    public function store(Request $request)
    {
       
        $month = $this->getMonthReport($request);
        $createdTimes = $this->countCreatedTimes($month);
        $latedTimes = $this->countLatedTimes($month);
        
        $report =Auth::user()->reports()->updateOrCreate(
             ['month' => $month->month],
             ['created_times' => $createdTimes,
             'lated_times' => $latedTimes]    
        ); 
        
        $reports = $this->getReport($request);

        return view('auth.report',compact('reports' ));
    } 

    public function getMonthReport(Request $request)
    {
        return Carbon::parse($request->get('month'));
    }

    public function countCreatedTimes($month)
    {
        return Auth::user()->timesheets()->whereYear('date', $month->year)
                                        ->whereMonth('date', $month->month)
                                        ->get()->count();
    }

    public function countLatedTimes($month)
    {
        return Auth::user()->timesheets()->whereYear('date', $month->year)
                                        ->whereMonth('date', $month->month)
                                        ->whereRaw(('HOUR(created_at) >= 8'))
                                        ->get()->count();
    }

    public function getReport(Request $request)
    {
        $month = $this->getMonthReport($request);

        return Auth::user()->reports()
                            ->where('month', $month->month)
                            ->get();
    }
}
