<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\AddUser;
use App\User;
use App\Traits\AuditLogs;

class AddUserController extends Controller
{
    use AuditLogs;

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {

        $users = AddUser::all();
        $roles = Role::all();
        $permissions = Permission::all();

        // return $users;
        return view('add-user')->with(['users'=>$users, 'roles'=>$roles, 'permissions'=>$permissions]);

    }

    public function add(Request $request)
    {
        //validate data
        $this->validate($request, [
            'email' => 'required|email',
            'role' => 'required'
        ]);

        // check if user exists
        $existed = AddUser::where("email", $request->email)->first();

        if ($existed != null) return redirect(route('adduser'))->with('message', 'User exists in our record.');

        $user = new AddUser;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->added_by = auth()->user()->email;

        if($user->save()) {

            //audit
            $action = "Added a user [".$request->email."]";
            $payload = json_encode($request->all());
            $this->storeAudits(auth()->user()->email, $action, $payload, $user);

            return redirect(route('adduser'))->with('message', 'User added successfully.');

        } else {
            //throw $th;
            return redirect(route('adduser'))->with('message', 'There was an issue with adding user. Please contact support.');
        }
    }

    public function delete(Request $request, $id) {

        $user = AddUser::find($id);
        $email = $user->email;

        // get User Model
        $userLogin = User::where("email", $email)->first();

        try {
            //delete user from user table
            if($userLogin != null) $userLogin->delete();

            //delete user from adduser table
            $user->delete();

            //audit
            $action = "Deleted a user [".$email."]";
            $payload = $email;
            $this->storeAudits(auth()->user()->email, $action, $payload, $user);

            // return view('add-user')->with(['users'=> $users, 'roles'=>$roles, 'message'=>$email.' deleted.']);
            return redirect(route('adduser'))->with('message', $email.' deleted.');

        } catch (\Throwable $th) {
            return redirect(route('adduser'))->with('message','There was an issue with deleting user. Please contact support.');
        }

    }

}
