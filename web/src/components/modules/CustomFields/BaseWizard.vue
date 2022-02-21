<template>
    <div :class="'modal fade ' +id+'-class'" :id="id" tabindex="-1" role="dialog" :aria-labelledby="id" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">{{ title }}
                        <br>
                        <small>{{ subtitle }}</small>
                    </h3>
                </div>
                <div class="card wizard-card" data-color="red">
                    <form @submit.prevent="submit" :enctype="form_enctype">
                        <loading :active='isSaving' :is-full-page="fullPage" :loader='loader' />
                        <div class="wizard-navigation">
                            <ul>
                                <li v-for="(tab, index) in tabs"><a :href="'#form_tab' + (index+1)" data-toggle="tab">{{ tab }}</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" v-for="(tab, index) in tabs" :id="'form_tab' + (index+1)">
                                <slot :name="'slot_tab' + (index+1)"></slot>
                            </div>
                        </div>
                    </form>
                </div> <!-- wizard container -->

                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-lg btn-rose btn-sm pull-right" @click="_recordSave" v-if="(currentPage == tabs.length) && hasSave">SAVE</button>
                            <button type="button" class="btn btn-lg btn-rose btn-sm pull-right" @click="_nextPage" v-if="currentPage < tabs.length">NEXT</button>
                            <button type="button" class="btn btn-lg btn-rose btn-sm pull-right back-button" @click="_prevPage" v-if="currentPage > 1">BACK</button>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import '../../../assets/css/material-bootstrap-wizard.css';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import Loading from 'vue-loading-overlay';

    export default {
        name: "BaseWizard",
        components:{
            Loading
        },
        props: {
            tabs: {
                type: Array,
                required: true
            },
            isSaving: {
                type: Boolean,
                default: false,
            },
            currentPage: {
                type : Number,
                default: 1
            },
            title: {
                type : String,
                default: ""
            },
            subtitle: {
                type : String,
                default: ""
            },
            id: {
                type : String,
                default: ""
            },
            hasSave: {
                type : Boolean,
                default: true
            },
            form_enctype: {
                type : String,
                default: "application/json"
            },
            base_data: {
                type : Object,
                default: null
            },
            recordId: {
                type : Number,
                default: 0
            },
            modal_leave_exempt: {
                type : Array,
                default: []
            }
        },
        data() {
            return {
                fullPage: false,
                loader: 'bars',
            }
        },
        mounted() {
            this.wizardInit();
            this.modalBeforeHide();
        },
        methods: {
            wizardInit : function() {
                var _self = this;
                $('.wizard-card').bootstrapWizard({
                    'tabClass': 'nav nav-pills',

                    onInit : function(tab, navigation, index){
                        //check number of tabs and fill the entire row
                        var $total = navigation.find('li').length;
                        var $wizard = navigation.closest('.wizard-card');

                        var $first_li = navigation.find('li:first-child a').html();
                        var $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
                        $('.wizard-card .wizard-navigation').append($moving_div);

                        _self.refreshAnimation($wizard, index);

                        $('.moving-tab').css('transition','transform 0s');
                    },

                    onTabShow: function(tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index+1;

                        var $wizard = navigation.closest('.wizard-card');

                        // If it's the last tab then hide the last button and show the finish instead
                        if($current >= $total) {
                            $($wizard).find('.btn-next').hide();
                            $($wizard).find('.btn-finish').show();
                        } else {
                            $($wizard).find('.btn-next').show();
                            $($wizard).find('.btn-finish').hide();
                        }

                        var button_text = navigation.find('li:nth-child(' + $current + ') a').html();

                        setTimeout(function(){
                            $('.moving-tab').text(button_text);
                        }, 150);

                        var checkbox = $('.footer-checkbox');

                        if( !index == 0 ){
                            $(checkbox).css({
                                'opacity':'0',
                                'visibility':'hidden',
                                'position':'absolute'
                            });
                        } else {
                            $(checkbox).css({
                                'opacity':'1',
                                'visibility':'visible'
                            });
                        }

                        _self.refreshAnimation($wizard, index);
                    }
                });

            },

            refreshAnimation : function($wizard, index){
                var $total = $wizard.find('.nav li').length;
                var $li_width = 100/$total;
                var wizard_width = ($wizard.width() <= 100)? 700 : $wizard.width();

                var total_steps = $wizard.find('.nav li').length;
                var move_distance = wizard_width / total_steps;
                var index_temp = index;
                var vertical_level = 0;

                var mobile_device = $(document).width() < 600 && $total > 3;

                if(mobile_device){
                    move_distance = wizard_width / 2;
                    index_temp = index % 2;
                    $li_width = 50;
                }

                $wizard.find('.nav li').css('width',$li_width + '%');

                var step_width = move_distance;
                move_distance = move_distance * index_temp;

                var $current = index + 1;

                if($current == 1 || (mobile_device == true && (index % 2 == 0) )){
                    move_distance -= 8;
                } else if($current == total_steps || (mobile_device == true && (index % 2 == 1))){
                    move_distance += 8;
                }

                if(mobile_device){
                    vertical_level = parseInt(index / 2);
                    vertical_level = vertical_level * 38;
                }

                if(index<0){
                    move_distance = 0;
                }
                
                $wizard.find('.moving-tab').css('width', step_width);
                $('.moving-tab').css({
                    'transform':'translate3d(' + move_distance + 'px, ' + vertical_level +  'px, 0)',
                    'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)',
                    'pointer-events': 'none'
                });
            },

            modalBeforeHide : function(){
                const _self = this;
                
                $("#"+_self.id).on('hide.bs.modal', function () {
                    if( _self.recordId <= 0 ){
                        var obj = _self.base_data;
                        var has_data = false;
                        var exempted = _self.modal_leave_exempt;

                        parentLoop : for (var key in obj) {
                            if (!obj.hasOwnProperty(key)) continue;

                            if(exempted.length){
                                for(var index in exempted){
                                    if(key==exempted[index]){
                                        continue parentLoop;
                                    }
                                }
                            }
                            console.log('_self.base_data[key]', key);
                            if(_self.base_data[key].toString().length >= 1){
                                console.log('key',key,_self.base_data[key]);
                                has_data = true;
                                break;
                            }
                        }

                        if(has_data){
                            if (window.confirm('Form is unsaved. Do you want to close the form?')){
                                return true;
                            }
                            else{
                                return false;
                            }
                        }
                    }
                    
                });
            },

            _recordSave : function(){
                this.$emit('_recordSave');
            },

            _nextPage : function(){
                this.$emit('_nextPage');
            },

            _prevPage : function(){
                this.$emit('_prevPage');
            },
        }
    };
</script>

<style scoped>
    div.modal-content {
        width : 700px;
    }
    button.back-button {
        margin-right : 5px !important;
    }
    ul.nav-pills {
        padding: 12px !important;
        margin-top:-12px !important;
    }
    div.card.wizard-card{
        margin-top : 0px !important;
        margin-bottom : 0px !important;
        box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0) !important;
    }
    div.tab-content{
        margin: 0px 30px !important;
        padding-top: 25px !important;
    }
    a {
        display: inline-block;
        pointer-events: none;
    }
</style>