@extends('layouts.master')
@section('content')
    <link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    {!! Toastr::message() !!}

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Table</a></li>
                    <li class="breadcrumb-item"><a href="">All Patients</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Patients</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="javascript:void(0);" class="fa-pull-right btn btn-primary shadow btn-xs " data-bs-toggle="modal" data-bs-target="#newPatientModal">New</a>
                                <br>
                                <table id="example2" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Id Card</th>
                                        <th>Gender</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Birth Date</th>
                                        <th>Address</th>
                                        <th>Post Code</th>
                                        <th>Contract Number</th>
                                        <th>Contract Number 2</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($patients as $key => $items)
                                        <tr>
                                            <td class="id_card">{{$items->id_card}}</td>
                                            <td class="gender">{{$items->gender}}</td>
                                            <td class="name">{{$items->name}}</td>
                                            <td class="surname">{{$items->surname}}</td>
                                            <td class="date_of_birth">{{$items->date_of_birth}}</td>
                                            <td class="address">{{$items->address}}</td>
                                            <td class="postcode">{{$items->postcode}}</td>
                                            <td class="contact_number1">{{$items->contact_number1}}</td>
                                            <td class="contact_number2">{{$items->contact_number2}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary shadow btn-xs sharp me-1" href="{{ route('patient/profile', ['id' => $items->id]) }}"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Id Card</th>
                                        <th>Gender</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Birth Date</th>
                                        <th>Address</th>
                                        <th>Post Code</th>
                                        <th>Contract Number</th>
                                        <th>Contract Number 2</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="modal fade" id="newPatientModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create New Patient</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('patient/new') }}" method="POST">
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
                                                        <label class="form-label">Contact Number 2</label>
                                                        <input type="text" class="form-control" name="contact_number2" >
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Gender</label>
                                                        <select class="form-select" name="gender">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Address</label>
                                                        <textarea class="form-control" name="address"></textarea>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Post Code</label>
                                                        <input type="text" class="form-control" name="postcode" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Birth Date</label>
                                                        <input type="text" placeholder="Birth Date"  class="form-control" name="date_of_birth" id='datepicker'>
                                                        <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
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

    @section('script')
        <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            $(document).on('click','.edit_user',function()
            {
                var _this = $(this).parents('tr');
                $('#e_user_id').val(_this.find('.user_id').text());
                $('#e_name').val(_this.find('.name').text());
                $('#e_email').val(_this.find('.email').text());
                $('#e_phone_number').val(_this.find('.phone_number').text());
                $('#e_join_date').val(_this.find('.join_date').text());
            });
        </script>

        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
                $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
            } );
        </script>

    @endsection
@endsection
