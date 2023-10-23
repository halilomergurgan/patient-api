<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = collect(
            json_decode(file_get_contents(database_path('data/patient.json')), true)
        );

        $patients->each(function ($patient) {

            $dbPatient = Patient::create([
                'id_card' => $patient['IdCard'],
                'gender' => $patient['Gender'],
                'name' => $patient['Name'],
                'surname' => $patient['Surname'],
                'date_of_birth' => $patient['DateOfBirth'],
                'address' => $patient['Address'],
                'postcode' => $patient['Postcode'],
                'contact_number1' => $patient['ContactNumber1'],
                'contact_number2' => $patient['ContactNumber2'],
            ]);

          foreach ($patient['NextOfKin'] as $nextOfKin) {
                $dbPatient->patientNextOfKins()->create([
                    'id_card' => $nextOfKin['IdCard'],
                    'name' => $nextOfKin['Name'],
                    'surname' => $nextOfKin['Surname'],
                    'contact_number1' => $nextOfKin['ContactNumber1'],
                    'contact_number2' => $nextOfKin['ContactNumber2'],
                ]);
            };

            foreach ($patient['Medical']['Conditions'] as $condition) {
                $condition = $dbPatient->patientMedicalConditions()->create([
                    'name' => $condition['Name'],
                    'notes' => $condition['Notes'],
                ]);

                foreach ($patient['Medical']['Allergies'] as $allergy) {
                    $condition->patientMedicalConditionAllergies()->create([
                        'name' => $allergy['Name'],
                        'notes' => $allergy['Notes'],
                    ]);
                };

                foreach ($patient['Medical']['Medication'] as $allergy) {
                    $condition->patientMedicalConditionMedications()->create([
                        'name' => $allergy['Name'],
                        'notes' => $allergy['Notes'],
                    ]);
                };
            };

        });
    }
}
