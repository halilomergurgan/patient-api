
@extends('layouts.master')
@section('content')
@include('sidebar.sidebar')
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">App</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ URL::to('assets/images/'.Session::get('avatar')) }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ Session::get('name') }}</h4>
                                    <p>Username</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ Session::get('email') }}</h4>
                                    <p>Email</p>
                                </div>
                            </div>
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
                                    <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Account Setting</h4>
                                                <form action="{{ route('user/self-update') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" placeholder="Name"  class="form-control" name="name" value="{{ Session::get('name') }}">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">User ID</label>
                                                            <input type="text" class="form-control" name="user_id" readonly value="{{ Session::get('user_id') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" placeholder="Email" readonly class="form-control" name="email" value="{{ Session::get('email') }}">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Join Date</label>
                                                            <input type="text" class="form-control" name="join_date" readonly value="{{ Session::get('join_date') }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Phone Number</label>
                                                            <input type="tel" placeholder="Phone Number" class="form-control"  name="phone_number" value="{{ Session::get('phone_number') }}">
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Update</button>
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
</div>

<!-- Edit Expense Modal -->
<div id="user_edit" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user/self-update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">User ID</label>
                            <input type="text" class="form-control" id="e_user_id" name="user_id" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="e_name" name="name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="e_email" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Mobile</label>
                            <input type="tel" class="form-control" id="e_phone_number" name="phone_number">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Join Date</label>
                            <input type="text" class="form-control" id="e_join_date" name="join_date" readonly>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary-save submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Expense Modal -->
@section('script')
    <!-- Bootstrap Core JS -->
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>

    <script>
        $(document).on('click','.user_edit',function()
        {
            var _this = $(this).parents('tr');
            $('#e_user_id').val(_this.find('.user_id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_phone_number').val(_this.find('.phone_number').text());
            $('#e_join_date').val(_this.find('.join_date').text());
        });
    </script>

@endsection
@endsection
