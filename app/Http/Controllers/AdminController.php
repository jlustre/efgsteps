<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function AdminChangePassword() {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.profile.admin_change_password', compact('profileData'));
    } // end method

    public function AdminProfileStore(Request $request) {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        $profileData->name = $request->name;
        $profileData->username = $request->username;
        $profileData->sponsor = $request->sponsor;
        $profileData->role = $request->role;
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

    public function AdminPasswordStore(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)) {
             $notification = array(
                'message' => 'Old Password Is Not Correct!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        $profileData = User::find($id);

        $profileData->password = bcrypt($request->password);
        $profileData->save();

        $notification = array(
            'message' => 'Admin Password Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

}