
@extends('layouts.master')
@section('content')
@include('sidebar.sidebar')
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('patient/table') }}">Patients</a></li>
                <li class="breadcrumb-item"><a href="">Patient Detail</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                            <form action="{{ route('patient/update', ['id' => $patient->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Id Card</label>
                                        <input type="text" class="form-control" name="id_card" readonly value="{{$patient->id_card}}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Gender</label>
                                        <input type="text" class="form-control" name="gender" value="{{$patient->gender}}" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$patient->name}}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Surname</label>
                                        <input type="text" class="form-control" name="surname" value="{{$patient->surname}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Birth Date</label>
                                        <input type="text" class="form-control" name="date_of_birth"  value="{{$patient->date_of_birth}}" readonly>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$patient->address}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Post Code</label>
                                        <input type="text" class="form-control" name="post_code" value="{{$patient->postcode}}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Contract Number</label>
                                        <input type="tel" class="form-control" name="contact_number1" value="{{$patient->contact_number1}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Contract Number 2</label>
                                        <input type="tel" class="form-control" name="contact_number2" value="{{$patient->contact_number2}}">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#next-of-kin" data-bs-toggle="tab" class="nav-link active show">Next Of Kin</a>
                                    </li>
                                    <li class="nav-item"><a href="#patient-conditions" data-bs-toggle="tab" class="nav-link">Conditions</a>
                                    </li>
                                    <li class="nav-item"><a href="#patient-allergies" data-bs-toggle="tab" class="nav-link">Allergies</a>
                                    </li>
                                    <li class="nav-item"><a href="#patient-medication" data-bs-toggle="tab" class="nav-link">Medication</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="next-of-kin" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="next-of-kin-form">
                                                <a href="javascript:void(0);" class="fa-pull-right btn btn-primary shadow btn-xs " data-bs-toggle="modal" data-bs-target="#nextOfKinModal">New</a>
                                                <br>
                                                <table id="example1" class="display" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Id Card</th>
                                                        <th>Name</th>
                                                        <th>Surname</th>
                                                        <th>Contract Number</th>
                                                        <th>Contract Number 2</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($patient->patientNextOfKins as $key => $items)
                                                        <tr>
                                                            <td class="id_card">{{$items->id_card}}</td>
                                                            <td class="name">{{$items->name}}</td>
                                                            <td class="surname">{{$items->surname}}</td>
                                                            <td class="contact_number1">{{$items->contact_number1}}</td>
                                                            <td class="contact_number2">{{$items->contact_number2}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="patient-conditions" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="medical-conditions">
                                                <a href="javascript:void(0);" class="fa-pull-right btn btn-primary shadow btn-xs " data-bs-toggle="modal" data-bs-target="#medicalConditionsModal">New</a>
                                                <br>
                                                <table id="example1" class="display" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Notes</th>
                                                        <th>Action</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($patient->patientMedicalConditions as $key => $items)
                                                        <tr>
                                                            <td class="name">{{$items->name}}</td>
                                                            <td class="notes">{{$items->notes}}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="javascript:void(0);" class="open-AddDialog fa-pull-right btn btn-primary shadow btn-xs ml-3" data-id="{{$items->id}}" data-bs-toggle="modal" data-bs-target="#allergiesModal">New Allergy</a>
                                                                    <a href="javascript:void(0);" class="open-AddDialog fa-pull-right btn btn-secondary shadow btn-xs ml-3" data-id="{{$items->id}}" data-bs-toggle="modal" data-bs-target="#medicationModal">New Medication</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="patient-allergies" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="medical-conditions">
                                                <table id="example1" class="display" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Notes</th>
                                                        <th>Medical Condition</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($patient->patientMedicalConditions as $key => $items)
                                                        @foreach($items->patientMedicalConditionAllergies as $key2 => $allergy)
                                                            <tr>
                                                                <td class="name">{{$allergy->name}}</td>
                                                                <td class="notes">{{$allergy->notes}}</td>
                                                                <td class="notes">{{$allergy->patientMedicalCondition->name}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="patient-medication" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="medical-conditions">
                                                <table id="example1" class="display" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Notes</th>
                                                        <th>Medical Condition</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($patient->patientMedicalConditions as $key => $items)
                                                        @foreach($items->patientMedicalConditionMedications as $key2 => $medication)
                                                            <tr>
                                                                <td class="name">{{$medication->name}}</td>
                                                                <td class="notes">{{$medication->notes}}</td>
                                                                <td class="notes">{{$medication->patientMedicalCondition->name}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="nextOfKinModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create New Next Of Kin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('patient/next-of-kin-store', ['id' => $patient->id]) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Id Card</label>
                                                        <input type="text" placeholder="Id Card"  class="form-control" name="id_card">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Surname</label>
                                                        <input type="text" placeholder="Surname"  class="form-control" name="surname">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Contact Number</label>
                                                        <input type="text" placeholder="Contact Number"  class="form-control" name="contact_number1">
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Contact Number</label>
                                                        <input type="text" class="form-control" name="contact_number1" >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="medicalConditionsModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create Medical</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('patient/medical-condition-store', ['id' => $patient->id]) }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Notes</label>
                                                        <input type="text" placeholder="note"  class="form-control" name="notes">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <div class="modal fade" id="allergiesModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create New Allegy</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('patient/medical-allergy-store', ['id' => $patient->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="medication_id" id="medication_id" value=""/>

                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Notes</label>
                                                        <input type="text" placeholder="note"  class="form-control" name="notes">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="medicationModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create New Medication</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('patient/medical-medication-store', ['id' => $patient->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="medication_id" id="medication_id" value=""/>

                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Notes</label>
                                                        <input type="text" placeholder="note"  class="form-control" name="notes">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>

    <script>
        $(document).on("click", ".open-AddDialog", function () {
            var medication_id = $(this).data('id');
            $(".modal-body #medication_id").val( medication_id );
        });
    </script>

@endsection
@endsection
