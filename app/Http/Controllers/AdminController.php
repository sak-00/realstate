<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    //
    public function adminDashboard()
    {
        return view('admin/index');
    }
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/Login');
    }

    public function adminLogin()
    {
        return view('admin/login');
    }

    public function adminProfile()
    {
        $id = Auth::user()->id; // get id of user to get all information about him from DB
        $profileDataUser = User::find($id);
        return view('admin/adminProfile', compact('profileDataUser'));
    }

    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id; // get id of user to get all information about him from DB
        $Data = User::find($id);
        $Data->username = $request->username;
        $Data->name = $request->name;
        $Data->email = $request->email;
        $Data->phone = $request->phone;
        $Data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            unlink(public_path('upload/adminImages/' . $Data->photo));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/adminImages'), $fileName);
            $Data['photo'] = $fileName;
        }
        $Data->save();
        $notification = array('message' => 'admin information updated successfullly', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



    public function ChangePasswordPage()
    {

        $id = Auth::user()->id; // get id of user to get all information about him from DB
        $profileDataUser = User::find($id);
        return view('admin/changePassword', compact('profileDataUser'));
    }

    public function adminUpdatePassword(Request $request)
    {
        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',

        ]);

        //match old pasword
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array('message' => 'old password doesnot match', 'alert-type' => 'error');
            return back()->with($notification);
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        $notification = array('message' => 'password has updated successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }



    //admin user all ways

    public function allAdmin()
    {
        //super Admin

        $allAdmin = User::where('role', 'admin')->orWhere('role', 'super Admin')->get();
        return view('backend/pages/admin/allAdmin', compact('allAdmin'));
    }

    public function addAdmin()
    {
        $roles = Role::all();

        return view('backend/pages/admin/addAdmin', compact('roles'));
    }


    public function storeAdmin(Request $request)
    {
        $roleOfUser = Role::find($request->role_id);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => $roleOfUser->name,
            'status' => 'active',
        ]);
        // $user = new User();
        // $user->name = $request->name;
        // $user->username = $request->username;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->address = $request->address;
        // $user->password = Hash::make($request->password);
        // $user->role = 'admin';
        // $user->status = 'active';
        // $user->save();


        if ($request->role_id) {
            $user->assignRole($request->role_id);
        }

        $notification = array('message' => 'admin has addedd successfully', 'alert-type' => 'success');
        return redirect()->route('allAdmin')->with($notification);
    }


    public function edit_admin($id)
    {
        $admin = User::findOrFail($id);
        $roles = Role::all();
        return view('backend/pages/admin/editAdmin', compact('admin', 'roles'));
    }

    public function updateAdmin(Request $request, $id)
    {

        $roleOfUser = Role::find($request->role_id);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = $roleOfUser->name;
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->role_id) {
            $user->assignRole($request->role_id);
        }

        $notification = array('message' => 'admin has updated successfully', 'alert-type' => 'success');
        return redirect()->route('allAdmin')->with($notification);
    }


    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);
        if (!is_null($admin)) {
            $admin->delete();
        }

        $notification = array('message' => 'admin has deleted successfully', 'alert-type' => 'success');
        return redirect()->route('allAdmin')->with($notification);
    }
}
