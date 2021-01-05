<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $invoices = DB::table('invoices')->orderBy('created_at', 'desc')->get();

        return view('invoices.index', [
            'invoices' => $invoices
        ]);
    }
}
