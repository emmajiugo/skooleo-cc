<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SchoolController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // get all schools
        $schools = DB::table('school_details')->orderBy('created_at', 'desc')->get();

        return view('school.index', [
            'schools' => $schools,
        ]);
    }

    public function view($id)
    {
        // get school details
        $school = $this->getSchoolDetails($id);

        $invoices = $this->getInvoicesStats($id);

        return view('school.view', [
            'school' => json_decode($school, true)[0],
            'invoices' => json_decode(json_encode($invoices), true)[0]
        ]);
    }

    public function withdraws($id)
    {
        $school = $this->getSchoolDetails($id);
        $successfulInvoice = $this->getTotalPaidInvoice($id);

        $withdraws = DB::table('withdrawal_histories')->where('school_detail_id', $id)->orderBy('created_at', 'desc')->get();

        $successfulWithdraws = $withdraws->where('status', 'SUCCESSFUL')->sum('amount');
        $successfulWithdrawFee = $withdraws->where('status', 'SUCCESSFUL')->sum('skooleo_fee');

        return view('school.withdraws', [
            'school' => json_decode($school, true)[0],
            'withdraws' => $withdraws,
            'totalPaidInvoice' => $successfulInvoice,
            'totalSuccessWithdraws' => $successfulWithdraws,
            'totalSuccessWithdrawFee' => $successfulWithdrawFee
        ]);
    }

    public function getInvoicesStats($id)
    {
        return DB::select("SELECT DISTINCT
                    (SELECT COUNT(`status`) FROM invoices WHERE `status`='PAID' AND school_detail_id=$id) AS paid,
                    (SELECT COUNT(`status`) FROM invoices WHERE `status`='UNPAID' AND school_detail_id=$id) AS unpaid
                    FROM invoices");
    }

    public function getSchoolDetails($id)
    {
        return DB::table('school_details')
        ->join('wallets', 'school_details.id', '=', 'wallets.school_detail_id')
        ->select('school_details.*', 'wallets.total_amount')
        ->where('school_details.id', $id)->get();
    }

    public function getTotalPaidInvoice($id)
    {
        return DB::table('invoices')
                    ->select('amount')
                    ->where('status', 'PAID')
                    ->where('school_detail_id', $id)->sum('amount');
    }
}
