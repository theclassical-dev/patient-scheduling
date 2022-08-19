<!DOCTYPE html>
<html lang="en">
<base href="{{ url('/') }}/">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="">

	<title>Certificate Records</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('css/vendors_css.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">

	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('css/skin_color.css')}}">
	<script src="js/vendors.min.js"></script>
	<!-- Vendor JS -->
	
	<script src="{{ asset("js/pages/chat-popup.js")}}"></script>
    <script src="{{ asset("assets/icons/feather-icons/feather.min.js")}}"></script>	

	<script src="{{ asset("assets/vendor_components/apexcharts-bundle/dist/apexcharts.js")}}"></script>
	<script src="{{ asset("assets/vendor_components/moment/min/moment.min.js")}}"></script>
	<script src="{{ asset("assets/vendor_components/fullcalendar/fullcalendar.js")}}"></script>
	<script src="{{ asset("assets/vendor_components/datatable/datatables.min.js")}}"></script>
	
	<!-- EduAdmin App -->
	<script src="{{asset("js/template.js")}}"></script>
	<script src="{{asset("js/pages/dashboard.js")}}"></script>
	<script src="{{asset("js/pages/calendar.js")}}"></script>


</head>

<body class="hold-transition light-skin sidebar-mini theme-primary">
	
	<div class="wrapper">
		{{-- <div id="loader"></div> --}}

		<header class="main-header">
			<div class="d-flex align-items-center logo-box justify-content-start">
				<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
					<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
				</a>	
				<!-- Logo -->
				<a href="index.html" class="logo">
					<!-- logo-->
					<div class="logo-lg">
						<p class="font-weight-600 text-info">Admin</p>
						<!-- <span class="light-logo"><img src="images/logo-dark-text.png" alt="logo"></span>
						<span class="dark-logo"><img src="images/logo-light-text.png" alt="logo"></span> -->
					</div>
				</a>	
			</div>  
			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<div class="app-menu">
					<ul class="header-megamenu nav">
						<li class="btn-group nav-item d-md-none">
							<a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
								<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
							</a>
						</li>

					</ul> 
				</div>

				<div class="navbar-custom-menu r-side">
					<ul class="nav navbar-nav">	



						<!-- User Account-->
						<li class="dropdown user user-menu">
							<a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
								<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
							</a>
							<ul class="dropdown-menu animated flipInX">
								<li class="user-body">
									<a class="dropdown-item" href="#"><i class="ti-lock text-muted mr-2"></i> Logout</a>
								</li>
							</ul>
						</li>	
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<!-- sidebar-->
			<section class="sidebar">	

				<!-- sidebar menu-->
				<ul class="sidebar-menu" data-widget="tree">		
						
					<li>
						<a href="{{ route('admin.dashboard') }}" title="">
                       <i class="fa fa-dashboard"><span class="path1"></span><span class="path2"></span></i>
                        <span>DASHBOARD</span>  </a>
					</li>
					<li>
						<a href="{{ route('admin.request') }}" title="">
                       <i class="fa fa-barcode"><span class="path1"></span><span class="path2"></span></i>
                        <span>SET APPOINTMENT</span>  </a>
					</li>
					<li>
						<a href="{{ route('admin.attendance') }}" title="">
                       <i class="fa fa-users"><span class="path1"></span><span class="path2"></span></i>
                        <span>ATTENDANCE</span>  </a>
					</li>
					
					<li>
						<a href="{{ route('admin.doctor') }}" title="">
                       <i class="fa fa-id-badge"><span class="path1"></span><span class="path2"></span></i>
                        <span>ADD DOCTORS</span>  </a>
					</li>
					<li>
						<a href="{{route('logout')}}" title=""
                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                       <i class="ti-lock text-muted mr-2"><span class="path1"></span><span class="path2"></span>
					   <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form></i>
                        <span>Log Out</span>  </a>
					</li>
					 	     
				</ul>
			</section>
			<div class="sidebar-footer">
				<!-- item-->
				<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><span class="icon-Settings-2"></span></a>
				<!-- item-->
				<a href="mailbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><span class="icon-Mail"></span></a>
				<!-- item-->
				<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
			</div>
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="container-full">
				<!-- Main content -->
				<section class="content">

				@yield("content")


				</section>
	 		</div>
  		</div>

		<footer class="main-footer">
			<div class="pull-right d-none d-sm-inline-block">
				<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
				</ul>
			</div>
			&copy; 2022 <a href="index.html"></a>. All Rights Reserved.
		</footer>
		<div class="control-sidebar-bg"></div>
		
	</div>
<!-- ./wrapper -->

<!-- <script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>	

	<script src="assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="assets/vendor_components/moment/min/moment.min.js"></script>
	 -->

	{{-- <script src="{{asset("js/template.js")}}"></script> --}}
	<script src="{{asset("js/pages/dashboard.js")}}"></script>
	<script src="{{asset("js/pages/calendar.js")}}"></script>
	<script src="{{asset("assets/vendor_components/fullcalendar/fullcalendar.js")}}"></script>
	<script src="{{asset("js/pages/dashboard2.js")}}"></script>
	<script src="js/pages/data-table.js"></script>

</body>
</html>


