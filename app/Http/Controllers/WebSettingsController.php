<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WebSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings = DB::table('web_settings')->find(1);
        // return json_decode(json_encode($settings), true);
        return view('web-settings', [
            'settings' => $settings
        ]);
    }

    public function post(Request $request)
    {
        // $settings = DB::table('web_settings')->find(1);

        $settings = DB::table('web_settings')->where('id', 1)
                    ->update([
                        'address' => $request->address,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'transaction_fee' => $request->transaction_fee,
                        'withdrawal_fee' => $request->withdrawal_fee,
                        'ecomm_store' => $request->ecomm_store,
                        'demo_link' => $request->demo_link,
                        'playstore_link' => $request->playstore,
                        'appstore_link' => $request->appstore,
                        'facebook_link' => $request->facebook,
                        'twitter_link' => $request->twitter,
                        'instagram_link' => $request->instagram
                    ]);

        if ($settings) return redirect(route('web.settings'))->with('message', 'Updated successfully');

        return redirect(route('web.settings'))->with('message', 'Update failed');
    }
}
