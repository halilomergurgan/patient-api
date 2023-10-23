<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <title>Patient Extratik</title>
        <link rel="shortcut icon" type="image/png" href="{{ URL::to('assets/images/favicon.png') }}">
        <link href="{{ URL::to('assets/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
        <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
    </head>
    <body class="vh-100">
        <style>
            .invalid-feedback{
                font-size: 14px;
            }
        </style>
        <div class="authincation h-100">
            <div class="container h-100">
                @yield('content')
            </div>
        </div>
    <script src="{{ URL::to('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/custom.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/dlabnav-init.js') }}"></script>
    @yield('script')
</body>
</html>
