<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        User::create([
            'name' => $request->name,
            'avatar' => $request->image,
            'email' => $request->email,
            'join_date' => $todayDate,
            'password' => Hash::make($request->password),
        ]);

        Toastr::success('Create new account successfully :)', 'Success');

        return redirect('login');
    }
}
