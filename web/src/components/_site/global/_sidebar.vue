<template>
		<div class="sidebar" data-color="rose" data-background-color="black" data-image="../../../../resources/img/sidebar-1.jpg">
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text logo-normal text-center">TRAVEL JAPAN</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="nav-item active ">
						<router-link class="nav-link" to="/home">
							<i class="material-icons">dashboard</i>
							<p> Dashboard </p>
						</router-link>
					</li>
				</ul>
			</div>
			<div class="sidebar-background"></div>
		</div>
</template>

<script>
export default {
	name: "SideBar",
	data() {
		return {
			loggedin_user: null
		}
	},
	created() {
		this.loggedin_user = this.$store.state.userInfo.name;
		if(!this.loggedin_user){
			this.loggedin_user = 'Unknown-User'
		}
	},
	mounted() {		
		this.pageInit();
	},
	methods: {
		pageInit: function(){

			// not working yet
			let sidebar = $('.sidebar');
			let sidebar_img_container = sidebar.find('.sidebar-background');
			// $sidebar_img_container.css('background-image', 'url("/img/sidebar-1.jpg")');
			// $sidebar_img_container.fadeIn('fast');
		}
	}
}
</script>

<style>

</style>