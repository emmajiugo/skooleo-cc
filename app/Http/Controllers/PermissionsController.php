<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\AuditLogs;

use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    use AuditLogs;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permissions = Permission::all();

        return view('dashboard.permissions')->with('permissions', $permissions);
    }

    public function create(Request $request)
    {
        //validate data
        $this->validate($request, [
            'permission' => 'required'
        ]);

        $permission = Permission::create(['name' => strtolower($request->permission)]);

        $permissions = Permission::all();

        if ($permission) {

            //audit
            $action = "Added a permission [".$request->permission."]";
            $payload = json_encode($request->all());
            $this->storeAudits(auth()->user()->email, $action, $payload, $permission);

            return view('dashboard.permissions')->with(['permissions'=>$permissions, 'message'=>'Permission created.']);
        } else {
            return view('dashboard.permissions')->with(['permissions'=>$permissions, 'message'=>'There was an issue with adding user. Please contact support.']);
        }
    }
}
