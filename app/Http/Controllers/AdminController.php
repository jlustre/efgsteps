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

    public function ViewEditProfile($id) {
        if (empty($id)) {
            $id = Auth::user()->id;
        }

        $profileData = User::find($id);

        return view('backend.pages.profile.profile', compact('profileData', 'id'));
    } // end method

    public function ProfileUpdate(Request $request, $id) {
        if(empty($id)) {
            $id = Auth::user()->id;
        }

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

        return redirect()->route('all.admin')->with($notification);
        // return redirect()->url()->previous()->with($notification);
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
        $allAdminArray = $alladmin->toArray();

        // dd($allAdminArray);

        for($i=0; $i < count($allAdminArray); $i++) {
            $sponsor = User::where('username', $allAdminArray[$i]['sponsor'])->first();
            if($sponsor) {
               $allAdminArray[$i]['sponsor_data'] = $sponsor;
            }
        }
        // dd($allAdminArray);

        $allDeletedAdmin = User::where('role', 'admin')
            ->onlyTrashed()
            ->get();
        $allDeletedAdminArray = $allDeletedAdmin->toArray();

        if(!empty($allDeletedAdminArray)) {
            for($j=0; $j < count($allDeletedAdminArray); $j++) {
                $sponsor = User::where('username', $allDeletedAdminArray[$j]['sponsor'])->first();
                if($sponsor) {
                    $allDeletedAdminArray[$j]['sponsor_data'] = $sponsor;
                }
            }
        }

        return view('backend.pages.admin.all_admin', compact('allAdminArray', 'allDeletedAdmin'));
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
            'current_rank' => 'required',
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
        $user->current_rank = $request->current_rank;
        $user->role = $request->role;
        $user->city_town = $request->city_town;
        $user->state_province = $request->state_province;
        $user->country = $request->country;
        $user->timezone = $request->timezone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/').$user->photo);
            $filename = date('YmdHi').'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $user->photo = $filename;
        }

        $user->save();

        $user->roles()->detach();
        if ($request->role) {
            $user->assignRole($request->role);
        };

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
            'current_rank' => 'required',
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
        $user->current_rank = $request->current_rank;
        $user->role =  $request->role;
        $user->city_town = $request->city_town;
        $user->state_province = $request->state_province;
        $user->country = $request->country;
        $user->timezone = $request->timezone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/').$user->photo);
            $filename = date('YmdHi').'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $user->photo = $filename;
        }

        $user->update();

        $user->roles()->detach();
        if ($request->role) {
            $user->assignRole($request->role);
        };

        $notification = array(
            'message' => 'Admin User Was Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // end method

    public function DeleteAdmin($id) {
        $user = User::findOrFail($id);

        if(!is_null($user)) {
            $user->delete();
            $user->roles()->detach();
        }

        $notification = array(
            'message' => 'An Admin Was Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    public function RestoreAdmin($id) {
        User::withTrashed()->where('id', $id)->restore();
        $user = User::findOrFail($id);

        if(!is_null($user)) {
            if ($user->role) {
                $user->roles()->detach();
                $user->assignRole($user->role);
            };
        }

        $notification = array(
            'message' => 'An Admin Was Restored Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    public function ForceDeleteAdmin($id) {
        User::withTrashed()->where('id', $id)->forceDelete();

        $notification = array(
            'message' => 'An Admin Was Force Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

}