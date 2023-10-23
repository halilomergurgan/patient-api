<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserManagementController extends Controller
{
    // index page
    public function index()
    {
        $users = User::all();

        return view('usermanagement.usertable', compact('users'));
    }

    // update record
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
            $updateRecord = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ];

            User::where("id", (int)$request->user_id)->update($updateRecord);
            Toastr::success('Updated user successfully :)', 'Success');
            DB::commit();

            $user = Auth::User();
            Session::put('name', $user->name);
            Session::put('email', $user->email);
            Session::put('user_id', $user->id);
            Session::put('join_date', $user->join_date);
            Session::put('phone_number', $user->phone_number);
            Session::put('avatar', $user->avatar);

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');

            return redirect()->back();
        }
    }

    /** delete record */
    public function deleteRecord(Request $request)
    {
        try {
            User::destroy($request->id);
            Toastr::success('User deleted successfully :)', 'Success');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');

            return redirect()->back();
        }
    }

    /** profile user */
    public function profileUser()
    {
        return view('usermanagement.userprofile');
    }
}
