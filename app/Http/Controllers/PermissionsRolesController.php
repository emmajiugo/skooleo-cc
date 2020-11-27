<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\AuditLogs;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsRolesController extends Controller
{
    use AuditLogs;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        // get role with permissions
        $rolesWithPermissions = $this->getPermissionsToARole($roles);

        // return $rolesWithPermissions;

        return view('dashboard.permission-role')->with(['permissions'=>$permissions, 'roles'=>$roles, 'role_with_permission'=>$rolesWithPermissions]);
    }

    public function assign(Request $request)
    {

        $email = auth()->user()->email;

        //validate data
        $this->validate($request, [
            'role' => 'required',
            'permissions' => 'required|array|min:1',
            'action' => 'required'
        ]);

        // get role
        $role = Role::findByName($request->role);

        // assign
        if ($request->action == "assign") {

            // assign permissions to role
            $res = $role->givePermissionTo($request->permissions);

            //audit
            $action = "Assigned permissions to role";
            $payload = json_encode($request->all());
            $this->storeAudits($email, $action, $payload, $res);
            $action = "assigned";

        } else {
            // revoke
            $res = $role->revokePermissionTo($request->permissions);

            //audit
            $action = "Revoke permissions to role";
            $payload = json_encode($request->all());
            $this->storeAudits($email, $action, $payload, $res);
            $action = "revoked";

        }

        // get all roles and permission
        $roles = Role::all();
        $permissions = Permission::all();

        // get role with permissions
        $rolesWithPermissions = $this->getPermissionsToARole($roles);

        return view('dashboard.permission-role')->with(['message'=>'Permission '.$action.' to role['.ucwords($request->role).'].', 'permissions'=>$permissions, 'roles'=>$roles, 'role_with_permission'=>$rolesWithPermissions]);
    }

    public function getPermissionsToARole($roles)
    {
        $rolesWithPermissions = array();
        foreach($roles as $role) {
            $permissions = Role::find($role->id)->permissions;

            $data = [
                'role' => $role->name,
                'permissions' => json_decode($permissions, true)
            ];
            array_push($rolesWithPermissions, $data);
        }

        return $rolesWithPermissions;
    }
}
