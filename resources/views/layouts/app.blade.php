<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.includes.head')
	@yield('header')
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	@include('layouts.includes.script')
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	@include('layouts.includes.navbar')
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@include('layouts.includes.menu')
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
				<div class="content">
					@yield('content')
				</div>
			<!-- /content area -->


			<!-- Footer -->
			@include('layouts.includes.footer')
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
