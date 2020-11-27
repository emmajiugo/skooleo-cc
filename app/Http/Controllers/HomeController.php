<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return $data;
        return view('home');
    }

    public function indexPost(Request $request)
    {
        $defaultYear = $request->year;
        $data = $this->pullUpChart($defaultYear);

        // return $data;
        return view('home')->with(["data" => $data, "year" => $defaultYear]);
    }

    public function pullUpChart($year)
    {
        $record = \App\AuditLog::select(
            DB::raw('count(response) as count'),
            DB::raw("DATE_FORMAT(created_at,'%M') as months")
        )
        ->where('action', 'Updated Mpesa Transaction')
        ->whereYear('created_at', $year)
        ->groupBy('months')
        ->orderBy('created_at', 'asc')
        ->get();

        $calendarMonths = array(
            'January' => 0,
            'February' => 0,
            'March' => 0,
            'April' => 0,
            'May' => 0,
            'June' => 0,
            'July' => 0,
            'August' => 0,
            'September' => 0,
            'October' => 0,
            'November' => 0,
            'December' => 0,
        );

        foreach($record as $mn) {
            $calendarMonths[$mn->months] += $mn->count;
        }

        return $calendarMonths;
    }
}
