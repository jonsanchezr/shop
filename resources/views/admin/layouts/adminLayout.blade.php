<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>@yield('title') - Estudio2b</title>

	<link rel="preconnect" href="//fonts.gstatic.com/" crossorigin="">

	<link href="{{asset('assets-admin/css/classic.css')}}" rel="stylesheet">

	<!-- PICK ONE OF THE STYLES BELOW -->
	<!-- <link href="css/classic.css" rel="stylesheet"> -->
	<!-- <link href="css/corporate.css" rel="stylesheet"> -->
	<!-- <link href="css/modern.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
		body {
			opacity: 0;
		}
	</style>
	<script src="{{asset('assets-admin/js/settings.js')}}"></script>
	<!-- END SETTINGS -->
	@yield('css')
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand" href="index.html">
          <i class="align-middle" data-feather="box"></i>
          <span class="align-middle">AppStack</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>
					<li class="sidebar-item active">
						<a href="#dashboards" data-toggle="collapse" class="sidebar-link">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
							<li class="sidebar-item active"><a class="sidebar-link" href="dashboard-default.html">Default</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-analytics-1.html">Analytics</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-e-commerce.html">E-commerce</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-social.html">Social</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-crypto.html">Crypto <span class="sidebar-badge badge badge-primary">New</span></a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#pages" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Pages</span>
            </a>
						<ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="pages-profile.html">Profile</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-settings.html">Settings</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-clients.html">Clients</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-projects.html">Projects <span class="sidebar-badge badge badge-primary">New</span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-invoice.html">Invoice</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-pricing.html">Pricing</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-tasks.html">Tasks <span class="sidebar-badge badge badge-primary">New</span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-blank.html">Blank Page</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#auth" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Auth</span>
              <span class="sidebar-badge badge badge-secondary">12/24</span>
            </a>
						<ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign In</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign Up</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-reset-password.html">Reset Password</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-404.html">404 Page</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-500.html">500 Page</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#layouts" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Layouts</span>
            </a>
						<ul id="layouts" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="layouts-sidebar-sticky.html">Sticky Sidebar</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="layouts-sidebar-collapsed.html">Collapsed Sidebar</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="layouts-boxed.html">Boxed Layout</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-analytics.html?theme=classic">Classic Theme</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-analytics-2.html?theme=corporate">Corporate Theme <span class="sidebar-badge badge badge-primary">New</span></a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-analytics-3.html?theme=modern">Modern Theme <span class="sidebar-badge badge badge-primary">New</span></a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#documentation" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Documentation</span>
            </a>
						<ul id="documentation" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="docs-introduction.html">Introduction</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="docs-installation.html">Getting Started</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="docs-plugins.html">Plugins</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="docs-changelog.html">Changelog</a></li>
						</ul>
					</li>

					<li class="sidebar-header">
						Components
					</li>
					<li class="sidebar-item">
						<a href="#ui" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">UI Elements</span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-modals.html">Modals</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-notifications.html">Notifications</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-tabs.html">Tabs</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#charts" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">Charts</span>
              <span class="sidebar-badge badge badge-primary">New</span>
            </a>
						<ul id="charts" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="charts-chartjs.html">Chart.js</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="charts-apexcharts.html">ApexCharts <span class="sidebar-badge badge badge-primary">New</span></a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
            </a>
						<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.html">Layouts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-elements.html">Basic Elements</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-advanced-elements.html">Advanced Elements</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-input-groups.html">Input Groups</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-editors.html">Editors</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-validation.html">Validation</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-wizard.html">Wizard</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#tables" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Tables</span>
            </a>
						<ul id="tables" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="tables-bootstrap.html">Bootstrap</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="tables-datatables.html">DataTables</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#icons" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="heart"></i> <span class="align-middle">Icons</span>
              <span class="sidebar-badge badge badge-info">Special</span>
            </a>
						<ul id="icons" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="icons-feather.html">Feather</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="icons-font-awesome.html">Font Awesome</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="calendar.html">
              <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Calendar</span>
              <span class="sidebar-badge badge badge-primary">New</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a href="#maps" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Maps</span>
            </a>
						<ul id="maps" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="maps-google.html">Google Maps</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="maps-vector.html">Vector Maps</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="#multi" data-toggle="collapse" class="sidebar-link">
              <i class="align-middle" data-feather="share-2"></i> <span class="align-middle">Multi Level</span>
            </a>
						<ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
							<li class="sidebar-item">
								<a href="#multi-2" data-toggle="collapse" class="sidebar-link collapsed">
                  Two Levels
                </a>
								<ul id="multi-2" class="sidebar-dropdown list-unstyled collapse">
									<li class="sidebar-item">
										<a class="sidebar-link" href="#">Item 1</a>
										<a class="sidebar-link" href="#">Item 2</a>
									</li>
								</ul>
							</li>
							<li class="sidebar-item">
								<a href="#multi-3" data-toggle="collapse" class="sidebar-link collapsed">
                  Three Levels
                </a>
								<ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
									<li class="sidebar-item">
										<a href="#multi-3-1" data-toggle="collapse" class="sidebar-link collapsed">
                      Item 1
                    </a>
										<ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
											<li class="sidebar-item">
												<a class="sidebar-link" href="#">Item 1</a>
												<a class="sidebar-link" href="#">Item 2</a>
											</li>
										</ul>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link" href="#">Item 2</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>

				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="{{asset('assets-admin/img/avatars/avatar.jpg')}}" alt="Chris Wood" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1">Chris Wood</h5>
							<div>
								<i class="fas fa-circle text-success"></i> Online
							</div>
						</div>
					</div>
				</div>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light bg-white">
				<a class="sidebar-toggle d-flex mr-2">
          <i class="hamburger align-self-center"></i>
        </a>

				<form class="form-inline d-none d-sm-inline-block">
					<input class="form-control form-control-no-border mr-sm-2" type="text" placeholder="Search projects..." aria-label="Search">
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-circle"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="{{asset('assets-admin/img/avatars/avatar-5.jpg')}}" class="avatar img-fluid rounded-circle" alt="Ashley Briggs">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Ashley Briggs</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="{{asset('assets-admin/img/avatars/avatar-2.jpg')}}" class="avatar img-fluid rounded-circle" alt="Carl Jenkins">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Carl Jenkins</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="{{asset('assets-admin/img/avatars/avatar-4.jpg')}}" class="avatar img-fluid rounded-circle" alt="Stacie Hall">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Stacie Hall</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="{{asset('assets-admin/img/avatars/avatar-3.jpg')}}" class="avatar img-fluid rounded-circle" alt="Bertha Martin">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Bertha Martin</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell-off"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">6h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.1</div>
												<div class="text-muted small mt-1">8h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Anna accepted your request.</div>
												<div class="text-muted small mt-1">12h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-flag dropdown-toggle" href="#" id="languageDropdown" data-toggle="dropdown">
                <img src="{{asset('assets-admin/img/flags/us.png')}}" alt="English">
              </a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
								<a class="dropdown-item" href="#">
                  <img src="{{asset('assets-admin/img/flags/us.png')}}" alt="English" width="20" class="align-middle mr-1">
                  <span class="align-middle">English</span>
                </a>
								<a class="dropdown-item" href="#">
                  <img src="{{asset('assets-admin/img/flags/es.png')}}" alt="Spanish" width="20" class="align-middle mr-1">
                  <span class="align-middle">Spanish</span>
                </a>
								<a class="dropdown-item" href="#">
                  <img src="{{asset('assets-admin/img/flags/de.png')}}" alt="German" width="20" class="align-middle mr-1">
                  <span class="align-middle">German</span>
                </a>
								<a class="dropdown-item" href="#">
                  <img src="{{asset('assets-admin/img/flags/nl.png')}}" alt="Dutch" width="20" class="align-middle mr-1">
                  <span class="align-middle">Dutch</span>
                </a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="{{asset('assets-admin/img/avatars/avatar.jpg')}}" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood"> <span class="text-dark">Chris Wood</span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html">Settings & Privacy</a>
								<a class="dropdown-item" href="#">Help</a>
								<a class="dropdown-item" href="#">Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			@yield('contentAdmin')

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms of Service</a>
								</li>
							</ul>
						</div>
						<div class="col-6 text-right">
							<p class="mb-0">
								&copy; 2019 - <a href="index.html" class="text-muted">AppStack</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{asset('assets-admin/js/app.js')}}"></script>

	<script>
		$(function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Last year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79]
					}, {
						label: "This year",
						backgroundColor: "#E8EAED",
						borderColor: "#E8EAED",
						hoverBackgroundColor: "#E8EAED",
						hoverBorderColor: "#E8EAED",
						data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							barPercentage: .75,
							categoryPercentage: .5,
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		$(function() {
			$("#datetimepicker-dashboard").datetimepicker({
				inline: true,
				sideBySide: false,
				format: "L"
			});
		});
	</script>
	<script>
		$(function() {
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: "transparent",
						borderColor: window.theme.primary,
						data: [2015, 1465, 1487, 1796, 1387, 2123, 2866, 2548, 3902, 4938, 3917, 4927]
					}, {
						label: "Orders",
						fill: true,
						backgroundColor: "transparent",
						borderColor: window.theme.tertiary,
						borderDash: [4, 4],
						data: [928, 734, 626, 893, 921, 1202, 1396, 1232, 1524, 2102, 1506, 1887]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.05)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 500
							},
							display: true,
							borderDash: [5, 5],
							gridLines: {
								color: "rgba(0,0,0,0)",
								fontColor: "#fff"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		$(function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Direct", "Affiliate", "E-mail", "Other"],
					datasets: [{
						data: [2602, 1253, 541, 1465],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger,
							"#E8EAED"
						],
						borderColor: "transparent"
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					}
				}
			});
		});
	</script>
	<script>
		$(function() {
			$("#datatables-dashboard-projects").DataTable({
				pageLength: 6,
				lengthChange: false,
				bFilter: false,
				autoWidth: false
			});
		});
	</script>
	@yield('js')
</body>

</html>