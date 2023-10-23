<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientMedicalConditionAllergy;
use App\Models\PatientMedicalConditionMedication;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /** home dashboard */
    public function index()
    {

        $data = [
            'total_patients' => Patient::all()->count(),
            'total_users' => User::all()->count(),
            'total_medications' => PatientMedicalConditionMedication::all()->count(),
            'total_allergies' => PatientMedicalConditionAllergy::all()->count(),
        ];

        return view('dashboard.home', compact('data'));
    }
}
