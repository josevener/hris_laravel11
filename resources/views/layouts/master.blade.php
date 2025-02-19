<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="SoengSouy Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="SoengSouy Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Dashboard - HRMS</title>
	<!-- Favicon -->
	{{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}"> --}}
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

	{{-- message toastr --}}
	<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
	<script src="{{ asset('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
</head>

<body>
	@yield('style')
	<style>
		.invalid-feedback{
			font-size: 14px;
		}
		.error{
			color: red;
		}
	</style>
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<!-- Loader -->
		<div id="loader-wrapper">
			<div id="loader">
				<div class="loader-ellips">
				  <span class="loader-ellips__dot"></span>
				  <span class="loader-ellips__dot"></span>
				  <span class="loader-ellips__dot"></span>
				  <span class="loader-ellips__dot"></span>
				</div>
			</div>
		</div>
		<!-- /Loader -->

		<!-- Header -->
        @include('layouts.navigation')
		<!-- /Header -->

		<!-- Sidebar -->
		@include('sidebar.sidebar')
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
        <div class="page-wrapper">
            <main>
                {{ $slot }}
            </main>
        </div>
		{{-- @yield('content') --}}
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
	<!-- Bootstrap Core JS -->
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<!-- Chart JS -->
	<script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
	<script src="{{ asset('assets/js/chart.js') }}"></script>
	<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
	<script src="{{ asset('assets/js/line-chart.js') }}"></script>

	<!-- Slimscroll JS -->
	<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
	<!-- Select2 JS -->
	<script src="{{ asset('assets/js/select2.min.js') }}"></script>
	<!-- Datetimepicker JS -->
	<script src="{{ asset('assets/js/moment.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
	<!-- Datatable JS -->
	<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
	<!-- Multiselect JS -->
	<script src="{{ asset('assets/js/multiselect.min.js') }}"></script>
	<!-- validation-->
	<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
	<!-- Custom JS -->
	<script src="{{ asset('assets/js/app.js') }}"></script>
	@yield('script')
</body>
</html>
