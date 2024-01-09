<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class RoleControll extends Controller
{
    //


    public function allPermission()
    {
        $premission = Permission::all();
        return view('backend/pages/permissions/allPermission', compact("premission"));
    }


    public function addPremission()
    {
        return view('backend/pages/permissions/addPermission');
    }

    public function storePremission(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:permissions|max:200',
        // ]);

        $permission = Permission::create([
            'name' => $request->premission_name,
            'group_name' => $request->group_name,
        ]);




        $notification = array('message' => 'Permission addedd successfullly', 'alert-type' => 'success');
        return redirect()->route('allPermission')->with($notification);
    }


    public function edit_premission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend/pages/permissions/editPermission', compact('permission'));
    }


    public function updatePermission(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:permissions|max:200',
        // ]);

        $id = $request->id;
        Permission::findOrFail($id)->update([
            'name' => $request->permission_name,
            'group_name' => $request->group_name,
        ]);




        $notification = array('message' => 'Permission updated successfullly', 'alert-type' => 'success');
        return redirect()->route('allPermission')->with($notification);
    }



    public function  delete_premission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array('message' => 'Permission deleted successfullly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    public function  importPremission()
    {

        return view('backend/pages/permissions/importPermission');
    }


    public function  Export()
    {

        return Excel::download(new PermissionExport, 'permissions.xlsx');
    }

    public function  Import(Request $request)
    {

        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array('message' => 'Permission imported successfullly', 'alert-type' => 'success');


        return redirect()->back()->with($notification);
    }


    ///////////////////////////////////
    public function allRoles()
    {
        $roles = Role::all();
        return view('backend/pages/roles/allRoles', compact("roles"));
    }

    public function addRoles()
    {
        return view('backend/pages/roles/addRoles');
    }

    public function storeRoles(Request $request)
    {

        $roles = Role::create([
            'name' => $request->roles_name,
        ]);




        $notification = array('message' => 'Roles addedd successfullly', 'alert-type' => 'success');
        return redirect()->route('allRoles')->with($notification);
    }


    public function edit_roles($id)
    {
        $roles = Role::findOrFail($id);
        return view('backend/pages/roles/editRoles', compact('roles'));
    }


    public function updateRoles(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:permissions|max:200',
        // ]);

        $id = $request->id;
        Role::findOrFail($id)->update([
            'name' => $request->roles_name,
        ]);




        $notification = array('message' => 'Role updated successfullly', 'alert-type' => 'success');
        return redirect()->route('allRoles')->with($notification);
    }



    public function  delete_roles($id)
    {
        Role::findOrFail($id)->delete();
        $notification = array('message' => 'Role deleted successfullly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    public function  addRoleToPermission()
    {

        $roles = Role::all();
        $premission = Permission::all();
        $premission_groups = User::getPermissionGroup();
        return view('backend/pages/rolesSetup/addRoleToPermission', compact('roles', 'premission', 'premission_groups'));
    }


    public function storeRolesinPermission(Request $request)
    {
        $data = array();
        $permissions = $request->permissions;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array('message' => 'Role Permission Added successfullly', 'alert-type' => 'success');

        return redirect()->route('allRolesInPermissions')->with($notification);
    }


    public function allRolesInPermissions()
    {

        $roles = Role::all();
        return view('backend/pages/rolesSetup/allRoleToPermission', compact('roles'));
    }


    public function admin_edit_roles($id)
    {

        $roles = Role::findOrFail($id);
        $premission = Permission::all();
        $premission_groups = User::getPermissionGroup();
        return view('backend/pages/rolesSetup/editRoleToPermission', compact('roles', 'premission', 'premission_groups'));
    }

    public function updateRolesinPermission(Request $request, $id)
    {

        $roles = Role::findOrFail($id);
        $premission = $request->permissions;
        if (!empty($premission)) {
            $roles->syncPermissions($premission);  //ready function -> multi permission assigned to one role
        }



        $notification = array('message' => 'Role Permission updated successfullly', 'alert-type' => 'success');

        return redirect()->route('allRolesInPermissions')->with($notification);
    }




    public function deleteRolesinPermission($id)
    {

        $roles = Role::findOrFail($id);
        if (!is_null($roles)) {
            $roles->delete();
        }



        $notification = array('message' => 'Role Permission deleted successfullly', 'alert-type' => 'success');

        return redirect()->route('allRolesInPermissions')->with($notification);
    }
}
