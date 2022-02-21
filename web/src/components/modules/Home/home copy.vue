<template>
	<div>
		<div class="wrapper ">
			<sidebar />
			<div class="main-panel">
				<nav-bar />
				<div class="content">
					<div class="content">
					<div class="container-fluid">
						<div class="row">
						<div class="col-md-12">
						</div>
						</div>
						<!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
			7 days
			</button> -->
						<div class="row">
						<div class="col-md-4">
							<div class="card card-chart">
							<div class="card-header card-header-rose" data-header-animation="true">
								<div class="ct-chart" id="websiteViewsChart"></div>
							</div>
							<div class="card-body">
								<div class="card-actions">
								<button type="button" class="btn btn-danger btn-link fix-broken-card">
									<i class="material-icons">build</i> Fix Header!
								</button>
								<button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
									<i class="material-icons">refresh</i>
								</button>
								<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
									<i class="material-icons">edit</i>
								</button>
								</div>
								<h4 class="card-title">Website Views</h4>
								<p class="card-category">Last Campaign Performance</p>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">access_time</i> campaign sent 2 days ago
								</div>
							</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-chart">
							<div class="card-header card-header-success" data-header-animation="true">
								<div class="ct-chart" id="dailySalesChart"></div>
							</div>
							<div class="card-body">
								<div class="card-actions">
								<button type="button" class="btn btn-danger btn-link fix-broken-card">
									<i class="material-icons">build</i> Fix Header!
								</button>
								<button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
									<i class="material-icons">refresh</i>
								</button>
								<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
									<i class="material-icons">edit</i>
								</button>
								</div>
								<h4 class="card-title">Daily Sales</h4>
								<p class="card-category">
								<span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">access_time</i> updated 4 minutes ago
								</div>
							</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-chart">
							<div class="card-header card-header-info" data-header-animation="true">
								<div class="ct-chart" id="completedTasksChart"></div>
							</div>
							<div class="card-body">
								<div class="card-actions">
								<button type="button" class="btn btn-danger btn-link fix-broken-card">
									<i class="material-icons">build</i> Fix Header!
								</button>
								<button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
									<i class="material-icons">refresh</i>
								</button>
								<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
									<i class="material-icons">edit</i>
								</button>
								</div>
								<h4 class="card-title">Completed Tasks</h4>
								<p class="card-category">Last Campaign Performance</p>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">access_time</i> campaign sent 2 days ago
								</div>
							</div>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
							<div class="card-header card-header-rose card-header-icon">
								<div class="card-icon">
								<i class="material-icons">verified</i>
								</div>
								<p class="card-category">Customers</p>
								<h3 class="card-title">184</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons text-danger">warning</i>
								<a href="#pablo">Get More Space...</a>
								</div>
							</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
							<div class="card-header card-header-info card-header-icon">
								<div class="card-icon">
								<i class="material-icons">celebration</i>
								</div>
								<p class="card-category">Events</p>
								<h3 class="card-title">75.521</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">local_offer</i> Tracked from Google Analytics
								</div>
							</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
							<div class="card-header card-header-success card-header-icon">
								<div class="card-icon">
								<i class="material-icons">menu_book</i>
								</div>
								<p class="card-category">Orders</p>
								<h3 class="card-title">$34,245</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">date_range</i> Last 24 Hours
								</div>
							</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
							<div class="card-header card-header-danger card-header-icon">
								<div class="card-icon">
								<i class="material-icons">notification_important</i>
								</div>
								<p class="card-category">Reminders</p>
								<h3 class="card-title">+245</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">update</i> Just Updated
								</div>
							</div>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
							<div class="card-header card-header-warning card-header-icon">
								<div class="card-icon">
								<i class="material-icons">auto_stories</i>
								</div>
								<p class="card-category">Bookings</p>
								<h3 class="card-title">184</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons text-danger">warning</i>
								<a href="#pablo">Get More Space...</a>
								</div>
							</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
							<div class="card-header card-header-info card-header-icon">
								<div class="card-icon">
								<i class="material-icons">room</i>
								</div>
								<p class="card-category">Website Visits</p>
								<h3 class="card-title">75.521</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">local_offer</i> Tracked from Google Analytics
								</div>
							</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
							<div class="card-header card-header-success card-header-icon">
								<div class="card-icon">
								<i class="material-icons">trending_up</i>
								</div>
								<p class="card-category">Revenue</p>
								<h3 class="card-title">$34,245</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">date_range</i> Last 24 Hours
								</div>
							</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
							<div class="card-header card-header-info card-header-icon">
								<div class="card-icon">
								<i class="fa fa-twitter"></i>
								</div>
								<p class="card-category">Followers</p>
								<h3 class="card-title">+245</h3>
							</div>
							<div class="card-footer">
								<div class="stats">
								<i class="material-icons">update</i> Just Updated
								</div>
							</div>
							</div>
						</div>
						</div>
						<h3>Current Event Listings</h3>
						<br>
						<div class="row">
						<div class="col-md-4">
							<div class="card card-product">
							<div class="card-header card-header-image" data-header-animation="true">
								<a href="#pablo">
									<img class="img" src="../../../../resources/img/card-2.jpg">
								</a>
							</div>
							<div class="card-body">
								<div class="card-actions text-center">
								<button type="button" class="btn btn-danger btn-link fix-broken-card">
									<i class="material-icons">build</i> Fix Header!
								</button>
								<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
									<i class="material-icons">art_track</i>
								</button>
								<button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
									<i class="material-icons">close</i>
								</button>
								</div>
								<h4 class="card-title">
								<a href="#pablo">Cozy 5 Stars Apartment</a>
								</h4>
								<div class="card-description">
								The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
								</div>
							</div>
							<div class="card-footer">
								<div class="price">
								<h4>$899/night</h4>
								</div>
								<div class="stats">
								<p class="card-category"><i class="material-icons">place</i> Barcelona, Spain</p>
								</div>
							</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-product">
							<div class="card-header card-header-image" data-header-animation="true">
								<a href="#pablo">
									<img class="img" src="../../../../resources/img/card-3.jpg">
								</a>
							</div>
							<div class="card-body">
								<div class="card-actions text-center">
								<button type="button" class="btn btn-danger btn-link fix-broken-card">
									<i class="material-icons">build</i> Fix Header!
								</button>
								<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
									<i class="material-icons">art_track</i>
								</button>
								<button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
									<i class="material-icons">close</i>
								</button>
								</div>
								<h4 class="card-title">
								<a href="#pablo">Office Studio</a>
								</h4>
								<div class="card-description">
								The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
								</div>
							</div>
							<div class="card-footer">
								<div class="price">
								<h4>$1.119/night</h4>
								</div>
								<div class="stats">
								<p class="card-category"><i class="material-icons">place</i> London, UK</p>
								</div>
							</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-product">
							<div class="card-header card-header-image" data-header-animation="true">
								<a href="#pablo">
									<img class="img" src="../../../../resources/img/card-1.jpg">
								</a>
							</div>
							<div class="card-body">
								<div class="card-actions text-center">
								<button type="button" class="btn btn-danger btn-link fix-broken-card">
									<i class="material-icons">build</i> Fix Header!
								</button>
								<button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
									<i class="material-icons">art_track</i>
								</button>
								<button type="button" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
									<i class="material-icons">close</i>
								</button>
								</div>
								<h4 class="card-title">
								<a href="#pablo">Beautiful Castle</a>
								</h4>
								<div class="card-description">
								The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
								</div>
							</div>
							<div class="card-footer">
								<div class="price">
								<h4>$459/night</h4>
								</div>
								<div class="stats">
								<p class="card-category"><i class="material-icons">place</i> Milan, Italy</p>
								</div>
							</div>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>				
				<nav-footer />
			</div>
		</div>
		<fixed-plugin />
	</div>
</template>

<script>
	import Servers from '../../../config/servers.config';

	export default {
		name: "Home",
		components: { 
		},
		data() {
			return {
				API: Servers.VUE_API_SERVER,
				module: "Dashboard",
				authToken: null,
			};
		},
		created() {
			// login authentication
			// home if already logged-in
			this.authToken = this.$store.state.authToken;
			if (!this.authToken) {
				this.$router.push("/");
				return;
			}

			this.$http.defaults.headers.common['Authorization'] = `Bearer ${this.authToken}`;

			$.ajaxSetup({
				headers: {
					'Authorization': `Bearer ${this.authToken}`
				}
			});
		},
		mounted() {
			// required for chart related loading
			// must be initially in root component
			// but will still work on sub-component			
			this.pageInit();
			md.initDashboardPageCharts();
      		md.initVectorMap();

		},
		methods: {
			pageInit: function(){

				// notes
				// 1. sidebar global or modular not yet working, leave it black for now

				let sidebar = $('.sidebar');
				let sidebar_img_container = sidebar.find('.sidebar-background');
				let full_page = $('.full-page');
				let sidebar_responsive = $('body > .navbar-collapse');
				let window_width = $(window).width();
				let fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

				if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
					if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
						$('.fixed-plugin .dropdown').addClass('open');
					}
				}

				$('.fixed-plugin a').click(function(event) {
					// Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
					if ($(this).hasClass('switch-trigger')) {
						if (event.stopPropagation) {
							event.stopPropagation();
						} else if (window.event) {
							window.event.cancelBubble = true;
						}
					}
				});

				$('.fixed-plugin .active-color span').click(function() {
					let full_page_background = $('.full-page-background');

					$(this).siblings().removeClass('active');
					$(this).addClass('active');

					var new_color = $(this).data('color');

					if (sidebar.length != 0) {
						sidebar.attr('data-color', new_color);
					}

					if (full_page.length != 0) {
						full_page.attr('filter-color', new_color);
					}

					if (sidebar_responsive.length != 0) {
						sidebar_responsive.attr('data-color', new_color);
					}
				});

				$('.fixed-plugin .background-color .badge').click(function() {
					$(this).siblings().removeClass('active');
					$(this).addClass('active');

					var new_color = $(this).data('background-color');

					if (sidebar.length != 0) {
						sidebar.attr('data-background-color', new_color);
					}
				});

				$('.fixed-plugin .img-holder').click(function() {
					let full_page_background = $('.full-page-background');

					$(this).parent('li').siblings().removeClass('active');
					$(this).parent('li').addClass('active');


					var new_image = $(this).find("img").attr('src');

					if (sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
						sidebar_img_container.fadeOut('fast', function() {
						sidebar_img_container.css('background-image', 'url("' + new_image + '")');
						sidebar_img_container.fadeIn('fast');
						});
					}

					if (full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
						var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

						full_page_background.fadeOut('fast', function() {
						full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
						full_page_background.fadeIn('fast');
						});
					}

					if ($('.switch-sidebar-image input:checked').length == 0) {
						var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
						var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

						sidebar_img_container.css('background-image', 'url("' + new_image + '")');
						full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
					}

					if (sidebar_responsive.length != 0) {
						sidebar_responsive.css('background-image', 'url("' + new_image + '")');
					}
					});

				$('.switch-sidebar-image input').change(function() {
					let full_page_background = $('.full-page-background');

					let input = $(this);

					if (input.is(':checked')) {
						if (sidebar_img_container.length != 0) {
							sidebar_img_container.fadeIn('fast');
							sidebar.attr('data-image', '#');
						}

						if (full_page_background.length != 0) {
							full_page_background.fadeIn('fast');
							full_page.attr('data-image', '#');
						}

						let background_image = true;
					} else {
						if (sidebar_img_container.length != 0) {
							sidebar.removeAttr('data-image');
							sidebar_img_container.fadeOut('fast');
						}

						if (full_page_background.length != 0) {
							full_page.removeAttr('data-image', '#');
							full_page_background.fadeOut('fast');
						}

						let background_image = false;
					}
				});

				$('.switch-sidebar-mini input').change(function() {
						let body = $('body');

						let input = $(this);

						if (md.misc.sidebar_mini_active == true) {
							$('body').removeClass('sidebar-mini');
							md.misc.sidebar_mini_active = false;

							if ($(".sidebar").length != 0) {
								var ps = new PerfectScrollbar('.sidebar');
							}
							if ($(".sidebar-wrapper").length != 0) {
								var ps1 = new PerfectScrollbar('.sidebar-wrapper');
							}
							if ($(".main-panel").length != 0) {
								var ps2 = new PerfectScrollbar('.main-panel');
							}
							if ($(".main").length != 0) {
								var ps3 = new PerfectScrollbar('main');
							}

						} else {

							if ($(".sidebar").length != 0) {
								var ps = new PerfectScrollbar('.sidebar');
								ps.destroy();
							}
							if ($(".sidebar-wrapper").length != 0) {
								var ps1 = new PerfectScrollbar('.sidebar-wrapper');
								ps1.destroy();
							}
							if ($(".main-panel").length != 0) {
								var ps2 = new PerfectScrollbar('.main-panel');
								ps2.destroy();
							}
							if ($(".main").length != 0) {
								var ps3 = new PerfectScrollbar('main');
								ps3.destroy();
							}

							setTimeout(function() {
								$('body').addClass('sidebar-mini');
								md.misc.sidebar_mini_active = true;
							}, 300);
						}

						// we simulate the window Resize so the charts will get updated in realtime.
						var simulateWindowResize = setInterval(function() {
							window.dispatchEvent(new Event('resize'));
						}, 180);

						// we stop the simulation of Window Resize after the animations are completed
						setTimeout(function() {
							clearInterval(simulateWindowResize);
						}, 1000);

					});
			}
		},
	};
</script>

<style>

</style>