<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\CCUser;
use App\CCAddUser;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = CCUser::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            // check if the user was added to use this platform
            $allowedUser = CCAddUser::where('email', $user->getEmail())->first();

            if($allowedUser) {
                $newUser                    = new CCUser;
                $newUser->provider_name     = $driver;
                $newUser->provider_id       = $user->getId();
                $newUser->name              = $user->getName();
                $newUser->email             = $user->getEmail();
                $newUser->email_verified_at = now();
                $newUser->avatar            = $user->getAvatar();

                if ($newUser->save()) {
                    // assign role to the new user
                    // $newUser->assignRole($allowedUser->role->name);
                }

                auth()->login($newUser, true);
            } else {
                return redirect(route('login'))->with('login_error', 'You are not allowed to access this portal.');
            }

        }

        return redirect($this->redirectPath());
    }
}
