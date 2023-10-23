<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientMedicalCondition;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{
    // index page
    public function index()
    {
        $patients = Patient::all();

        return view('patient.patient', compact('patients'));
    }

    // patient page
    public function profilePatient(int $id)
    {
        $patient = Patient::with(
            'patientNextOfKins',
            'patientMedicalConditions.patientMedicalConditionAllergies',
            'patientMedicalConditions.patientMedicalConditionMedications')
            ->findOrFail($id);

        return view('patient.patientprofile', compact('patient'));
    }

    // patient page
    public function patientUpdate(Request $request, int $id)
    {
        DB::beginTransaction();
        try {
            $updateRecord = [
                'gender' => $request->gender,
                'name' => $request->name,
                'surname' => $request->surname,
                'address' => $request->address,
                'postcode' => $request->post_code,
                'contact_number1' => $request->contact_number1,
                'contact_number2' => $request->contact_number2,
            ];

            Patient::where("id", $id)->update($updateRecord);

            Toastr::success('Updated user successfully :)', 'Success');

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');

            return redirect()->back();
        }
    }

    public function patientNextOfKinStore(Request $request, int $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'id_card' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'contact_number1' => 'required|string|max:255',
                'contact_number2' => 'nullable|string|max:255',
            ]);

            $patient = Patient::findOrFail($id);

            $patient->patientNextOfKins()->create([
                'id_card' => $request->id_card,
                'name' => $request->name,
                'surname' => $request->surname,
                'contact_number1' => $request->contact_number1,
                'contact_number2' => $request->contact_number2,
            ]);

            Toastr::success('Updated user successfully :)', 'Success');

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');

            return redirect()->back();
        }
    }

    public function medicalConditionStore(Request $request, int $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'notes' => 'nullable|string|max:255',
            ]);

            $patient = Patient::findOrFail($id);

            $patient->patientMedicalConditions()->create([
                'name' => $request->name,
                'notes' => $request->notes,
            ]);

            Toastr::success('Updated user successfully :)', 'Success');

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');

            return redirect()->back();
        }
    }

    public function allergyStore(Request $request, int $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'notes' => 'nullable|string|max:255',
            ]);

            $patientMedicalCondition = PatientMedicalCondition::findOrFail($request->get('medication_id'));

            $patientMedicalCondition->patientMedicalConditionAllergies()->create([
                'name' => $request->name,
                'notes' => $request->notes,
            ]);

            Toastr::success('Updated user successfully :)', 'Success');

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');

            return redirect()->back();
        }
    }

    public function medicationStore(Request $request, int $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'notes' => 'nullable|string|max:255',
            ]);

            $patientMedicalCondition = PatientMedicalCondition::findOrFail($request->get('medication_id'));

            $patientMedicalCondition->patientMedicalConditionMedications()->create([
                'name' => $request->name,
                'notes' => $request->notes,
            ]);

            Toastr::success('Updated user successfully :)', 'Success');

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');

            return redirect()->back();
        }
    }

    public function patientStore(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'id_card' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'contact_number1' => 'required|string|max:255',
                'contact_number2' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:500',
                'postcode' => 'nullable|string|max:50',
                'date_of_birth' => 'required|string|max:255',
                'gender' => 'required|string|max:10',
            ]);

            $patient = Patient::create([
                'id_card' => $request->id_card,
                'name' => $request->name,
                'surname' => $request->surname,
                'contact_number1' => $request->contact_number1,
                'contact_number2' => $request->contact_number2,
                'address' => $request->address,
                'postcode' => $request->postcode,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
            ]);

            Toastr::success('Created patient successfully :)', 'Success');

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, patient create :)', 'Error');

            return redirect()->back();
        }
    }
}
