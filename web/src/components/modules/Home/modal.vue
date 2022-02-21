<template>
	<BaseWizard 
        id="modalWindow"
        :title="selectedCity"
        subtitle="Restaurants, Malls and Others"
        :tabs="tabs" 
        :currentPage="currentPage" 
        :selectedCity="selectedCity">
        <template v-slot:slot_tab1>
            <!--<BaseSelectRemote _icon="fastfood" _placeholder="Select Item" :_error="field_errors.item_id" v-model="orderInfo.item_id" ref="item_select" _url="order/itemlist"/> -->
            <div class="material-datatables">
                <loading :active='isLoading' is-full-page="false" loader="bars" />
                <table id="datatables" class="table table-striped table-no-bordered" cellspacing="0" width="99%" style="width:99%; cursor:pointer;"></table>
            </div>
        </template>
    </BaseWizard>
</template>

<script>
    import 'vue-loading-overlay/dist/vue-loading.css';
    import Servers from '../../../config/servers.config';
    import BaseWizard from '../CustomFields/BaseWizard.vue';
    import BaseSelectRemote from '../CustomFields/BaseSelectRemote.vue';
    import Loading from 'vue-loading-overlay';

    let grid;

    export default {
        name: 'ModalWindow',
        props: ['selectedCity'],
        components:{
            BaseWizard,
            BaseSelectRemote,
            Loading,
        },
        data() {
            return {
                API: Servers.VUE_API_SERVER,
                currentPage : 1,
                isLoading: false,
                tabs: ['DETAILS'],
                orderInfo: {
                    item_id: '',
                    qty: '',
                    procedure: '',
                    garnish: '',
                    plate: '',
                    plate_qty: '',
                    customer_event_id: ''
                }
            }
        },
        mounted() {
            this.init();
        },
        methods: {
            init: function() {
            
            },

            loadTable: function(city) {
                
				let _self = this;
				_self.isLoading = true;

				let moduleGrid = $("#datatables").DataTable({				
					pagingType: "full_numbers",
					scrollX: true,
					order: [[0, "DESC"]],
					rowReorder: false,
					colReorder: false,
					responsive: true,	
					pageLength: 10,				
					lengthMenu: [
						[10, 25, 50, -1],
						[10, 25, 50, "All"],
					],
					select: {
						style: "single",
					},
					language: {
						search: "Search",
						searchPlaceholder: "...",
						emptyTable: "No data available.",
					},
					columns: [
                        { responsivePriority: 1, title: "<h6>Image</h6>", data: "image", width: '5%'},
						{ responsivePriority: 1, title: "<h6>Venue</h6>", data: "venue_name", width: '5%'},
						{ responsivePriority: 1, title: "<h6>Address</h6>", data: "address", width: '5%'}
					],
					ajax: {
                        url: _self.API+'/weather/getVenues/'+city,
						type: "GET",
						dataSrc: function(json) {
							_self.isLoading = false;
							return json.data;
						}
					}
				});

				grid = moduleGrid;
			},

        }
    }
</script>

<style>
    div.semi_card {
        border : 2px solid #aba0a0 !important;
        padding-bottom : 20px !important;
        border-radius : 15px !important;
        margin: 5px !important;
    }
    div.no_padding {
        padding-left : 0px !important;
        padding-right : 0px !important;
    }
    small.sublabel {
        font-family: sans-serif !important;
        color: #aaaaaa !important;
        line-height: 2 !important;
        margin-left: 10px !important;
    }
    .dp__input{
        font-size: 14px !important;
    }
</style>