<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class AcademicSessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sessions = DB::table('sessions')->orderBy('created_at', 'desc')->get();

        return view('academic-session', [
            'sessions' => $sessions
        ]);
    }

    public function post(Request $request)
    {
        $session = DB::table('sessions')->insert(
            ['sessionname' => $request->session, 'created_at' => NOW(), 'updated_at' => NOW()]
        );

        if ($session) return redirect(route('academic.session'))->with('message', 'Added successfully.');

        return redirect(route('web.settings'))->with('message', 'Action failed.');
    }
}
