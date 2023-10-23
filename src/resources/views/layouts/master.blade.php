<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title> Home Page</title>
	<link rel="shortcut icon" type="image/png" href="{{URL::to('assets/images/favicon.png')}}">
	<link href="{{URL::to('assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::to('assets/vendor/nouislider/nouislider.min.css')}}">
	<link href="{{URL::to('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link href="{{URL::to('assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
	<script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>

</head>
<body>

    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">L</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">a</span>
		   <span style="--i:4">d</span>
		   <span style="--i:5">i</span>
		   <span style="--i:6">n</span>
		   <span style="--i:7">g</span>
		   <span style="--i:8">.</span>
		   <span style="--i:9">.</span>
		   <span style="--i:10">.</span>
		</div>
    </div>

    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('home') }}" class="brand-logo">
                <img width="50%" src="{{ URL::to('assets/images/logo-full.png') }}" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
								<div class="input-group search-area">
                                    <select class="form-control" id="search-general" placeholder="Id Card" style="width:500px;" name="user_id"></select>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>

       	@include('sidebar.sidebar')
        @yield('content')

        <div class="footer"></div>
	</div>

    <script src="{{URL::to('assets/vendor/global/global.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('assets/js/plugins-init/datatables.init.js')}}"></script>
	<script src="{{URL::to('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{URL::to('assets/vendor/nouislider/nouislider.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/wnumb/wNumb.js')}}"></script>
	<script src="{{URL::to('assets/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{URL::to('assets/js/custom.min.js')}}"></script>
	<script src="{{URL::to('assets/js/dlabnav-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script type="text/javascript">
        function searchGeneralTemplateResult(item, container) {
            return $('<span>' + item.text.replace('[br]', '<br/>').replace('[strong]', '<strong>').replace('[/strong]', '</strong>') + '</span>');
        }

        $("#search-general").select2({
            placeholder: "Please search a patient",
            ajax: {
                delay: 250,
                url: '{{ route('search') }}',
                dataType: "json",
                placeholder: "Search",
            },
            templateResult: searchGeneralTemplateResult
        });

        $("#search-general").on("select2:select", function(e) {
            var data = e.params.data;
            switch (data.type) {
                case "patient":
                    var url = "{{ route('patient/profile', [ 'id' => ':id']) }}";
                    url = url.replace(':id', data.id);
                    window.location.href = url;
                    break;
                default:
                    break;
            }
            $('#search-general').val(null).trigger('change');
        });

    </script>
	@yield('script')
</body>
</html>
