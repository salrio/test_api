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
								
								<loading :active='isLoading' is-full-page="false" loader="bars" />
								<div class="col-md-4" v-for='city in cities' >
									<div class="card card-product" data-toggle='modal' data-target='.modalWindow-class' @click="setCity" :name="city.cityName">
										<div class="card-header card-header-image" data-header-animation="true">
											<a href="#pablo">
												<img class="city_photo" :src="city.placePhoto">
											</a>
										</div>
										<div class="card-body">
											<!--<div class="card-actions text-center row">
												<div class="col-sm-1 col-xs-1 col-lg-3" title="Humidity">
													<i class="material-icons">whatshot</i><h6 class="info_h6">{{ city.weather.main.humidity }}</h6>
												</div>
												<div class="col-sm-1 col-xs-1 col-lg-3" title="Wind Speed">
													<i class="material-icons">speed</i><h6 class="info_h6">{{ city.weather.wind.speed }}</h6>
												</div>
												<div class="col-sm-1 col-xs-1 col-lg-3" title="Maximum Temperature">
													<i class="material-icons">arrow_circle_up</i><h6 class="info_h6">{{ city.weather.main.temp_max }}</h6>
												</div>
												<div class="col-sm-1 col-xs-1 col-lg-3" title="Minimum Temperature">
													<i class="material-icons">arrow_circle_down</i><h6 class="info_h6">{{ city.weather.main.temp_min }}</h6>
												</div>
											</div> -->
											<div class="card-actions text-center row">
												<table>
													<tr>
														<td>
															<i class="material-icons">whatshot</i><h6 class="info_h6">{{ city.weather.main.humidity }}</h6>
														</td>
														<td>
															<i class="material-icons">speed</i><h6 class="info_h6">{{ city.weather.wind.speed }}</h6>
														</td>
														<td>
															<i class="material-icons">arrow_circle_up</i><h6 class="info_h6">{{ city.weather.main.temp_max }}</h6>
														</td>
														<td>
															<i class="material-icons">arrow_circle_down</i><h6 class="info_h6">{{ city.weather.main.temp_min }}</h6>
														</td>
													</tr>
												</table>
											</div>
											<h4 class="card-title">
												<a class="city_title" data-toggle='modal' data-target='.modalWindow-class' @click="setCity" :name="city.cityName">{{ city.cityName }}</a>
											</h4>
											<div class="card-description">
												{{ city.description }}
											</div>
										</div>
										<div class="card-footer">
											<div class="price">
												<img id="wicon" :src="city.weatherIcon" alt="Weather icon">
												{{ city.weather.weather[0].main }}
											</div>
											<div class="stats">
												<p class="card-category">
													<i class="material-icons">thermostat</i>{{ city.weather.main.temp }}
												</p>
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
		<modal-window :selectedCity="selectedCity" ref="city_modal_window" />
	</div>
</template>

<script>
	import 'vue-loading-overlay/dist/vue-loading.css';
	import Servers from '../../../config/servers.config';
	import ModalWindow from './modal.vue';
	import Loading from 'vue-loading-overlay';

	export default {
		name: "Home",
		components: { 
			ModalWindow,
			Loading,
		},
		data() {
			return {
				API: Servers.VUE_API_SERVER,
				module: "Dashboard",
				isLoading: false,
				selectedCity:'',
				cities: [],
				cityInfo:[]
			};
		},
		mounted() {		
			this.pageInit();

		},
		methods: {
			pageInit: function(){
				var _self = this;
                this.isLoading = true;

				this.$http.get(`weather`)
                    .then((res) => {
                        let result = res.data.data;
                        if(!result){
                            _self.isLoading = false;
                            return;
                        }

						_self.cities = result;

						for (var key in result) {
							if (!result.hasOwnProperty(key)) continue;
							
							_self.cityInfo.push(result[key]['cityName']);

							console.log(_self.cityInfo);
						}

                        _self.isLoading = false;
                    }).catch((err) => {
                        console.log(err)
                });
			},

			setCity: function(event){
				this.selectedCity = $(event.target).parents('.card-product').attr('name');
				// this.$refs.city_modal_window.loadTable(this.selectedCity);
			}
		},
	};
</script>

<style>
	.card-product:hover {
		background-color: #FCE8EE;
		cursor: pointer;
	}
	.info_h6 {
		color: green;
	}
	.card-actions{
		border-bottom: 1px solid grey;
		margin-left:auto;
		margin-right:auto;
	}
	.city_photo{
		max-height:300px;
		height:auto;
	}
	.city_title{
		font-weight: bold;
	}
	.city_title:hover{
		color: #e91e62 !important;
		cursor: pointer;
	}
	table{
		width:100%;
	}
</style>