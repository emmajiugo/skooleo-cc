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
        // return $school->school_number;

        $invoices = $this->getInvoicesStats($id);

        return view('school.view', [
            'school' => $school,
            'invoices' => $invoices
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
            'school' => $school,
            'withdraws' => $withdraws,
            'totalPaidInvoice' => $successfulInvoice,
            'totalSuccessWithdraws' => $successfulWithdraws,
            'totalSuccessWithdrawFee' => $successfulWithdrawFee
        ]);
    }

    public function getSchoolDetails($id)
    {
        return DB::table('school_details')
        ->join('wallets', 'school_details.id', '=', 'wallets.school_detail_id')
        ->select('school_details.*', 'wallets.total_amount')
        ->where('school_details.id', $id)->first();
    }

    public function getInvoicesStats($id)
    {
        $invoices = DB::select("SELECT DISTINCT
                    (SELECT COUNT(`status`) FROM invoices WHERE `status`='PAID' AND school_detail_id=$id) AS paid,
                    (SELECT COUNT(`status`) FROM invoices WHERE `status`='UNPAID' AND school_detail_id=$id) AS unpaid
                    FROM invoices");

        if (count($invoices)) return json_decode(json_encode($invoices), true)[0];

        return ['paid' => 0, 'unpaid' => 0];
    }

    public function getTotalPaidInvoice($id)
    {
        return DB::table('invoices')
                    ->select('amount')
                    ->where('status', 'PAID')
                    ->where('school_detail_id', $id)->sum('amount');
    }

    public function activate($id)
    {
        $activated = DB::table('school_details')->where('id', $id)
            ->update([
                'verifystatus' => 1
            ]);

        return redirect(route('schools.view', $id));
    }

    public function disable($id)
    {
        $activated = DB::table('school_details')->where('id', $id)
            ->update([
                'verifystatus' => 0
            ]);

        return redirect(route('schools.view', $id));
    }

}
