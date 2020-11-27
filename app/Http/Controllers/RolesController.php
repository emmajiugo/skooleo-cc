<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Traits\AuditLogs;
use App\User;

class RolesController extends Controller
{
    use AuditLogs;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();

        return view('dashboard.roles')->with('roles', $roles);
    }

    public function create(Request $request)
    {
        //validate data
        $this->validate($request, [
            'role' => 'required'
        ]);

        $role = Role::create(['name' => strtolower($request->role)]);

        $roles = Role::all();

        if ($role) {

            //audit
            $action = "Added a role [".$request->role."]";
            $payload = json_encode($request->all());
            $this->storeAudits(auth()->user()->email, $action, $payload, $role);

            return view('dashboard.roles')->with(['roles'=>$roles, 'message'=>'Role created.']);
        } else {
            return view('dashboard.roles')->with(['roles'=>$roles, 'message'=>'There was an issue with adding user. Please contact support.']);
        }
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->permissions;

        //return users assigned to the role and remove the role
        $users = User::role($role->name)->get();
        if($users !=  null) {
            foreach($users as $user) {
                $user->removeRole($role->name);
            }
        }

        //revoke permission assigned to the role
        $role->revokePermissionTo($permissions);
        //delete the role
        $role->delete();

        return redirect(route('roles'))->with("success", "Role deleted successfully.");
    }
}
