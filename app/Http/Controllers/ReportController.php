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
        $created_times = $this->countCreatedTimes($month);
        $lated_times = $this->countLatedTimes($month);
        
        if( $created_times!=0 ){
            $report =Auth::user()->reports()->updateOrCreate(
                ['month' => $month->month],
                ['created_times' => $created_times,
                'lated_times' => $lated_times]
            );
        } 
        
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
                                        // ->whereDate('created_at', '!=' ,'date')
                                        ->whereRaw('DATE(created_at) != date')
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
