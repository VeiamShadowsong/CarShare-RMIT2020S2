<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Automatic Car Share System</title>
		<meta name="robots" content="noindex,nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{asset('resources/images/favicon.png')}}" />

		<!--begin::Web font -->
		<script src="{{asset('resources/theme/assets/app/js/webfont.js')}}"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

		<!--end::Web font -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="{{asset('resources/theme/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="{{asset('resources/theme/vendors/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/jstree/dist/themes/default/style.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/chartist/dist/chartist.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/vendors/flaticon/css/flaticon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('resources/theme/vendors/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles -->
		<link href="{{asset('resources/theme/assets/demo/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		@yield('css')
		<!--end::Page Vendors Styles -->
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-page--loading-enabled m-page--loading m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default">

		<!-- begin::Page loader -->
		<div class="m-page-loader m-page-loader--base">
			<div class="m-blockui">
				<span>Please wait...</span>
				<span>
					<div class="m-loader m-loader--brand"></div>
				</span>
			</div>
		</div>

		<!-- end::Page Loader -->

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

			<!-- BEGIN: Header -->
			<header id="m_header" class="m-grid__item    m-header " m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop  m-header__wrapper">

						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand m-brand--mobile">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="/" class="m-brand__logo-wrapper">
										<img alt="" src="{{asset('resources/theme/assets/app/media/img/logos/logo-1.png')}}" width="60%" />
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">

									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_toggle_mobile" class="m-brand__icon m-brand__toggler m-brand__toggler--left">
										<span></span>
									</a>
									<!-- END -->
								</div>
							</div>
						</div>

						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--middle m-stack__item--left m-header-head" id="m_header_nav">
							<div class="m-stack m-stack--ver m-stack--desktop">
								<div class="m-stack__item m-stack__item--middle m-stack__item--fit">

									<!-- BEGIN: Aside Left Toggle -->
									<a href="javascript:;" id="m_aside_left_toggle" class="m-aside-left-toggler m-aside-left-toggler--left m_aside_left_toggler">
										<span></span>
									</a>

									<!-- END: Aside Left Toggle -->
								</div>
								<div class="m-stack__item m-stack__item--fluid">

									<!-- BEGIN: Horizontal Menu -->
									<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
									<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
										<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
											<li class="m-menu__item"><a href="{{url('/')}}" class="m-menu__link"><i class="m-menu__link-icon flaticon-analytics"></i><span class="m-menu__link-text">Dashboard</span></a>
											</li>
											<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span
													 class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-users"></i><span class="m-menu__link-text">Users</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
												<div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:300px"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
													<div class="m-menu__subnav">
														<ul class="m-menu__content">
															<li class="m-menu__item">
																<ul class="m-menu__inner">
																	<br/>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="{{url('/admin/dashboard')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">User Dashboard</span></a></li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="{{url('/admin/create-new-user')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Create New User</span></a></li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="{{url('/admin/user-list/all')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">User List</span></a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</li>
											<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span
															class="m-menu__item-here"></span><i class="m-menu__link-icon fa fa-car"></i><span class="m-menu__link-text">Cars</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
												<div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:300px"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
													<div class="m-menu__subnav">
														<ul class="m-menu__content">
															<li class="m-menu__item">
																<ul class="m-menu__inner">
																	<br/>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="{{url('/admin/cars')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Cars</span></a></li>
																	<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="{{url('/admin/makes')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Makes</span></a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</li>
											<li class="m-menu__item"><a href="{{url('/admin/orders')}}" class="m-menu__link"><i class="m-menu__link-icon fa fa-list-ol"></i><span class="m-menu__link-text">Orders</span></a>
											<li class="m-menu__item"><a href="{{url('/admin/payments')}}" class="m-menu__link"><i class="m-menu__link-icon la la-dollar"></i><span class="m-menu__link-text">Payments</span></a>
										</ul>
									</div>

									<!-- END: Horizontal Menu -->
								</div>
							</div>
						</div>
						<div class="m-stack__item m-stack__item--middle m-stack__item--center">

							<!-- BEGIN: Brand -->
							<a href="index.html" class="m-brand m-brand--desktop">
								<img alt="" src="{{asset('resources/theme/assets/app/media/img/logos/logo-1.png')}}" width="70px"/>
							</a>

							<!-- END: Brand -->
						</div>
						<div class="m-stack__item m-stack__item--right">

							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">

										<li class="m-nav__item m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__username m--hidden-mobile">{{Session::get('admin')[0]['username']}}</span>
												<span class="m-nav__link-icon m-topbar__usericon  m--hide">
													<span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center">
														<div class="m-card-user m-card-user--skin-light">
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">{{Session::get('admin')[0]['username']}}</span>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__item">
																	<a href="{{url('/my-profile')}}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">My Profile</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="{{url('/reset-password')}}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-settings-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">Update Password</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																<li class="m-nav__item">
																	<a href="{{url('/admin/logout')}}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>

									</ul>
								</div>
							</div>

							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>

			<!-- END: Header -->

			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
			<div id="m_aside_left" class="m-aside-left  m-aside-left--skin-dark ">

				<!-- BEGIN: Aside Menu -->
				<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" m-menu-scrollable="1" m-menu-dropdown-timeout="500">
					<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
						<li class="m-menu__section m-menu__section--first">
							<h4 class="m-menu__section-text">USERS</h4>
							<i class="m-menu__section-icon flaticon-more-v2"></i>
						</li>
						<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('/admin/dashboard')}}" class="m-menu__link "><i class="m-menu__link-icon flaticon-dashboard"></i><span class="m-menu__link-text">Users Dashboard</span></a></li>
						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-list-2"></i><span class="m-menu__link-text">Users</span><i
								 class="m-menu__ver-arrow la la-angle-right"></i></a>
							<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('/admin/user-list/all')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">All</span></a></li>
									<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('/admin/user-list/month')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">This Month</span></a></li>
									<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('/admin/user-list/today')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Today</span></a></li>
								</ul>
							</div>
						</li>
						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-car"></i><span class="m-menu__link-text">Cars</span><i
										class="m-menu__ver-arrow la la-angle-right"></i></a>
							<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('/admin/cars')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Cars</span></a></li>
									<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('/admin/makes')}}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Makes</span></a></li>
								</ul>
							</div>
						</li>
						<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('/admin/orders')}}" class="m-menu__link "><i class="m-menu__link-icon fa fa-list-ol"></i><span class="m-menu__link-text">Orders</span></a></li>
						<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{url('/admin/payments')}}" class="m-menu__link "><i class="m-menu__link-icon la la-dollar"></i><span class="m-menu__link-text">Payments</span></a></li>
					</ul>
				</div>

				<!-- END: Aside Menu -->
			</div>

			<!-- END: Left Aside -->

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-container--full-height">
					<div class="m-grid__item m-grid__item--fluid m-wrapper">
                        @yield('body')
					</div>
				</div>
			</div>

			<!-- end:: Body -->

			<!-- begin::Footer -->
			<footer class="m-grid__item  m-footer ">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2020 &copy; Powerd by <a href="https://github.com/HundredEyesMonk/ProgrammingProject2020.git" class="m-link">Group HDPLZ</a>
							</span>
						</div>
					</div>
				</div>
			</footer>

			<!-- end::Footer -->
		</div>

		<!-- end:: Page -->

		<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>

		<!-- end::Scroll Top -->


		<!--begin:: Global Mandatory Vendors -->
		<script src="{{asset('resources/theme/vendors/jquery/dist/jquery.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/moment/min/moment.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/wnumb/wNumb.js')}}" type="text/javascript"></script>

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<script src="{{asset('resources/theme/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/jstree/dist/jstree.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/chartist/dist/chartist.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/js/framework/components/plugins/charts/chart.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('resources/theme/vendors/js/framework/components/plugins/base/sweetalert2.init.js')}}" type="text/javascript"></script>

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Bundle -->
		<script src="{{asset('resources/theme/assets/demo/base/scripts.bundle.js')}}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors -->

		<!--end::Page Vendors -->

		<!--begin::Page Scripts -->
		@yield('script')

		<!--end::Page Scripts -->

		<!-- begin::Page Loader -->
		<script>
			$(window).on('load', function() {
				$('body').removeClass('m-page--loading');
			});
		</script>

		<!-- end::Page Loader -->
	</body>

	<!-- end::Body -->
</html>
