<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		Navigation
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">

		<!-- Main navigation -->
		<div class="card card-sidebar-mobile">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				<!-- Main -->
				<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
				<li class="nav-item">
					<a href="i{{ URL::to('/transaksi') }}" class="nav-link active"><i class="icon-home4"></i><span>Transaksi</span></a>
				</li>
				<li class="nav-item">
					<a href="{{ URL::to('/pelanggan') }}" class="nav-link"><i class="icon-copy"></i> <span>Pelanggan</span></a>
				</li>
				<li class="nav-item">
					<a href="{{ Url::to('/pedagang') }}" class="nav-link"><i class="icon-color-sampler"></i> <span>Pedagang</span></a>
				</li>
				<!-- /main -->
			</ul>
		</div>
		<!-- /main navigation -->

	</div>
	<!-- /sidebar content -->
	
</div>
<!-- /main sidebar -->