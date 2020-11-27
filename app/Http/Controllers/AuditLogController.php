<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AuditLog;
use App\AddUser;

class AuditLogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        return view('dashboard.audit');
    }

    public function search(Request $request)
    {
        //validation
        $this->validate($request, [
            'searchquery' => 'required'
        ]);

        $search = $request->searchquery;

        $logs = AuditLog::where('email', $search)->orWhere('payload', 'like', '%' . $search . '%')
                                                ->orderBy('created_at', 'desc')
                                                ->get();
        // return $logs;

        return view('dashboard.audit')->with(['data' => $logs]);
    }
}
