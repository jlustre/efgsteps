<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Password;
use App\Rules\NotEqual;

class AdminController extends Controller
{
    public function AdminDashboard() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.index', compact('profileData'));
    } // end method

    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    } // end method

    public function AdminLogin() {
        return view('admin.admin_login');
    } // end method

    public function AdminProfile() {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile', compact('profileData'));
    } // end method

    public function AdminProfileStore(Request $request) {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        $profileData->name = $request->name;
        $profileData->username = $request->username;
        $profileData->sponsor = $request->sponsor;
        $profileData->role = $request->role;
        $profileData->current_rank = $request->current;
        $profileData->email = $request->email;
        $profileData->phone = $request->phone;
        $profileData->country = $request->country;
        $profileData->city_town = $request->city_town;
        $profileData->state_province = $request->state_province;
        // $profileData->status = $request->status;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/').$profileData->photo);
            $filename = date('YmdHi').'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $profileData->photo = $filename;
        }

        $profileData->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    //This will show the form
    public function AdminChangePassword() {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.profile.admin_change_password', compact('profileData'));
    } // end method

    //This will save the changes
    public function AdminUpdatePassword(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match the old password
        if(!Hash::check($request->old_password, Auth::user()->password)) {
             $notification = array(
                'message' => 'Old Password Is Incorrect!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        // Update the new password
        User::whereId(Auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Updated Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    } // end method

    ///////// Admin /////////
    public function AllAdmin() {
        $alladmin = User::where('role', 'admin')->get();

        return view('backend.pages.admin.all_admin', compact('alladmin'));
    } // end method

    public function AddAdmin() {
        $roles = Role::all();

        return view('backend.pages.admin.add_admin', compact('roles'));
    } // end method

    public function EditAdmin($id) {
        $admin = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin', compact('admin', 'roles'));
    } // end method

    public function StoreAdmin(Request $request) {

        $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|unique:users|max:28',
            'sponsor' => ['required', new NotEqual('username'), 'exists:users,username',],
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'city_town' => 'required',
            'state_province' => 'required',
            'country' => 'required',
            'timezone' => 'required',
            'password' => ['required', 'confirmed','min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!*$#%]).*$/',
            ],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->sponsor = $request->sponsor;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->city_town = $request->city_town;
        $user->state_province = $request->state_province;
        $user->country = $request->country;
        $user->timezone = $request->timezone;
        $user->save();

        $notification = array(
            'message' => 'New Admin User Was Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    } // end method

    public function UpdateAdmin(Request $request, $id) {
         $request->validate([
            'name' => 'required|max:250',
            'username' => ['required','max:28',Rule::unique('users')->ignore($id)],
            'sponsor' => ['required',new NotEqual('username'),'exists:users,username'],
            'email' => ['required','email', Rule::unique('users')->ignore($id),],
            'phone' => 'required',
            'city_town' => 'required',
            'state_province' => 'required',
            'country' => 'required',
            'timezone' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->sponsor = $request->sponsor;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role =  $request->role;
        $user->city_town = $request->city_town;
        $user->state_province = $request->state_province;
        $user->country = $request->country;
        $user->timezone = $request->timezone;
        $user->update();

        $notification = array(
            'message' => 'Admin User Was Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // end method

    public function DeleteAdmin($id) {
        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'An Admin Was Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

}