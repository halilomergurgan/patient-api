<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock',
        ]);
    }

    /** index page login */
    public function login()
    {
        return view('auth.login');
    }

    /** login with databases */
    public function authenticate(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            $username = $request->username;
            $password = $request->password;

            if (Auth::attempt(['email' => $username, 'password' => $password])) {

                $user = Auth::User();
                Session::put('name', $user->name);
                Session::put('email', $user->email);
                Session::put('user_id', $user->id);
                Session::put('join_date', $user->join_date);
                Session::put('phone_number', $user->phone_number);
                Session::put('avatar', $user->avatar);

                Toastr::success('Login successfully :)', 'Success');

                return redirect()->intended('home');
            } else {
                Toastr::error('fail, wrong email or password :)', 'Error');

                return redirect('login');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, login :)', 'Error');

            return redirect()->back();
        }
    }

    /** logout */
    public function logout(Request $request)
    {
        Auth::logout();
        // forget login session
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('user_id');
        $request->session()->forget('join_date');
        $request->session()->forget('phone_number');
        $request->session()->forget('avatar');
        $request->session()->flush();

        Toastr::success('Logout successfully :)', 'Success');

        return redirect('login');
    }

}
