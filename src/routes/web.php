<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TypeFormController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// -----------------------------login-------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
});

Route::controller(SearchController::class)->group(function () {
    Route::get('/','index')->middleware('auth')->name('index');
    Route::get('/search','search')->middleware('auth')->name('search');
});

// -------------------------- user managements ----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('user/table', 'index')->middleware('auth')->name('user/table');
    Route::post('user/update', 'updateRecord')->name('user/update');
    Route::post('user/self-update', 'updateRecord')->name('user/self-update');
    Route::post('user/delete', 'deleteRecord')->name('user/delete');
    Route::get('user/profile', 'profileUser')->middleware('auth')->name('user/profile');

});

// -------------------------- patient managements ----------------------//
Route::controller(PatientController::class)->group(function () {
    Route::get('patient/table', 'index')->middleware('auth')->name('patient/table');
    Route::get('patient/profile/{id}', 'profilePatient')->middleware('auth')->name('patient/profile');
    Route::post('patient/profile/{id}', 'patientUpdate')->middleware('auth')->name('patient/update');
    Route::post('patient/profile/next-of-kin-store/{id}', 'patientNextOfKinStore')->middleware('auth')->name('patient/next-of-kin-store');
    Route::post('patient/profile/medical-condition-store/{id}', 'medicalConditionStore')->middleware('auth')->name('patient/medical-condition-store');
    Route::post('patient/profile/allergy-store/{id}', 'allergyStore')->middleware('auth')->name('patient/medical-allergy-store');
    Route::post('patient/profile/medication-store/{id}', 'medicationStore')->middleware('auth')->name('patient/medical-medication-store');
    Route::post('patient/new', 'patientStore')->middleware('auth')->name('patient/new');
});

