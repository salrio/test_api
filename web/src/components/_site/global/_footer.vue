<template>
		<footer class="footer">
			<div class="container-fluid">
				<nav class="float-left">
					<ul>
						<li>
							<a href="#">
							DevTeam
							</a>
						</li>
						<li>
							<a href="#">
							About Us
							</a>
						</li>
						<li>
							<a href="#">
							Blog
							</a>
						</li>
						<li>
							<a href="#">
							Licenses
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright float-right">
				&copy;
				{{ fullYear }}, made with <i class="material-icons">favorite</i> by
				<a href="#" target="_blank">[company-name]</a> for a better web.
				</div>
			</div>
		</footer>
</template>

<script>
	export default {
		name: "NavFooter",
		data() {
			return {
				fullYear: ""
			}
		},
		mounted() {
			this.getFullYear();
		},
		methods: {
			getFullYear: function(){
				this.fullYear = new Date().getFullYear();
			}
		}
	};
</script>

<style>
</style>