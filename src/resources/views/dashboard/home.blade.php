@extends('layouts.master')
@section('content')
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row invoice-card-row">
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="card bg-warning invoice-card">
                    <div class="card-body d-flex">
                        <div>
                            <h2 class="text-white invoice-num">{{$data['total_patients']}}</h2>
                            <span class="text-white fs-18">Total Patients</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="card bg-success invoice-card">
                    <div class="card-body d-flex">
                        <div>
                            <h2 class="text-white invoice-num">{{$data['total_users']}}</h2>
                            <span class="text-white fs-18">Total Users</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="card bg-info invoice-card">
                    <div class="card-body d-flex">
                        <div>
                            <h2 class="text-white invoice-num">{{$data['total_medications']}}</h2>
                            <span class="text-white fs-18">Total Medications</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="card bg-secondary invoice-card">
                    <div class="card-body d-flex">
                        <div>
                            <h2 class="text-white invoice-num">{{$data['total_allergies']}}</h2>
                            <span class="text-white fs-18">Total Allergies</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
