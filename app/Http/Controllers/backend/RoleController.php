<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\PermissionGroup;

class RoleController extends Controller
{
    public function AllPermission() {
        $permissions = Permission::orderBy('group_name')->get();
        $permission_groups = PermissionGroup::all();
        return view('backend.pages.permission.all_permission', compact('permissions', 'permission_groups'));
    }//End Method

    public function AddPermission() {
        $permission_groups = PermissionGroup::all();
        return view('backend.pages.permission.add_permission', compact('permission_groups'));
    }//End Method

    public function StorePermission(Request $request) {

        $request->validate([
            'name' => 'required|unique:permissions|max:250',
            'group_name' => 'required',
        ]);

        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'New Permission Was Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);
    }//End Method

    public function UpdatePermission(Request $request, $id) {

        $request->validate([
            'name' => ['required', Rule::unique('permissions')->ignore($id), 'max:250'],
            'group_name' => 'required',
        ]);

        $permission = Permission::findOrFail($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Was Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);
    }//End Method

    public function EditPermission($id) {
        $permission = Permission::findOrFail($id);
        $permission_groups = PermissionGroup::all();
        return view('backend.pages.permission.edit_permission', compact('permission', 'permission_groups'));
    }//End Method

    public function DeletePermission($id) {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Was Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    //***************************************

     public function AllPermissionGroup() {
        $permission_groups = PermissionGroup::all();
        return view('backend.pages.permission_group.all_permission_group', compact('permission_groups'));
    }//End Method

    public function AddPermissionGroup() {
        return view('backend.pages.permission_group.add_permission_group');
    }//End Method

    public function StorePermissionGroup(Request $request) {

        $request->validate([
            'name' => 'required|unique:permission_groups|max:250',
        ]);

        PermissionGroup::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'New Permission Group Was Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission_group')->with($notification);
    }//End Method

    public function UpdatePermissionGroup(Request $request, $id) {

        $request->validate([
            'name' => ['required', Rule::unique('permission_groups')->ignore($id), 'max:250'],
        ]);

        $permission_group = PermissionGroup::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Permission Group Was Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission_group')->with($notification);
    }//End Method

    public function EditPermissionGroup($id) {
        $permission_group = PermissionGroup::findOrFail($id);
        return view('backend.pages.permission_group.edit_permission_group', compact('permission_group'));
    }//End Method

    public function DeletePermissionGroup($id) {
        PermissionGroup::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Group Was Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    //***************************************

    public function ExportPermission() {

       return view('backend.pages.permission.import_permission');
    } // end method

    public function ImportPermission() {
       return view('backend.pages.permission.import_permission');
    } // end method

    public function Export() {
        return Excel::download(new PermissionExport, 'permissions_'.date('YmdHi').'.xlsx');
    } // end method

    public function Import(Request $request) {
        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Table Was Imported Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method

    // *************** Roles********************
    public function AllRole() {
        $roles = Role::all();
        return view('backend.pages.role.all_role', compact('roles'));
    }//End Method

    public function AddRole() {
        return view('backend.pages.role.add_role');
    }//End Method

    public function StoreRole(Request $request) {

        $request->validate([
            'name' => 'required|unique:roles|max:250',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'New Role Was Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }//End Method

    public function UpdateRole(Request $request, $id) {

        $request->validate([
            'name' => ['required', Rule::unique('roles')->ignore($id), 'max:250'],
        ]);

        $role = Role::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Was Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }//End Method

    public function EditRole($id) {
        $role = Role::findOrFail($id);
        return view('backend.pages.role.edit_role', compact('role'));
    }//End Method

    public function DeleteRole($id) {
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Was Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    // *************** Roles Permission********************
    public function AddRolesPermission() {

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    }//End Method

    public function RolePermissionStore(Request $request) {

        $request->validate([
            'role_id' => 'required'
        ]);

        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key=>$item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        } //End foreach

        $notification = array(
            'message' => 'Role Permissions Were Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);

    }//End Method

    public function AllRolesPermission() {

        $roles = Role::all();

        return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));

    }//End Method

    public function AdminEditRoles($id) {

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
    }//End Method

    public function AdminRolesUpdate(Request $request, $id) {

        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permissions Were Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }//End Method

    public function AdminDeleteRoles($id) {

        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permissions Were Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }//End Method
}