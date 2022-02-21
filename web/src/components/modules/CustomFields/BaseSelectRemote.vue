<template>
    <div class="input-group">
        <div class="input-group-prepend col-sm-1" :class="_class">
            <span class="input-group-text">
                <i class="material-icons">{{ _icon }}</i>
            </span>
        </div>
        <div class="col-sm-11">
            <Multiselect 
                ref="multiselect"
                class="custom_class"
                :class="computedClass"
                :value="modelValue"
                :placeholder="_placeholder" 
                :title="computedTitle"
                :filterResults="filterResults" 
                :minChars="minChars" 
                :resolveOnLoad="resolveOnLoad" 
                :delay="delay" 
                :searchable="searchable" 
                :options="options"
                @change="updateInput"
            />
        </div>
    </div>
</template>

<script>
    import Servers from '../../../config/servers.config';
    import Multiselect from '@vueform/multiselect'
    import '@vueform/multiselect/themes/default.css';

    const fetchData = async (query, base_api_url, url, token, selected_text) => {
        if (query == null){
            var query = selected_text;
        }
        else{
            query = (typeof query != 'undefined')? query : '';
            if (query.length < 1) {
                query = selected_text;
            }
        }

        const response = await fetch(
            base_api_url+'/'+url+'/'+query,
            {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer '+token,
                }
            }
        );
        const data = await response.json(); // Here you have the data that you need

        return data.data.map((item) => {
            return { value: item.id, label: item.name }
        })
    }

    export default {
        name: "BaseSelectRemote",
        props: {
            _class: {
                type: String,
                default: "",
            },
            _class2: {
                type: String,
                default: "",
            },
            _icon: {
                type: String,
                default: "face",
            },
            _placeholder: {
                type: String,
                default: "",
            },
            _error: {
                type: String,
                default: "",
            },
            _url: {
                type: String,
                default: "",
            },
            modelValue: {
                type: [String, Number],
                default: "",
            }
        },
        components: {
            Multiselect,
        },
        computed: {
            computedClass() {
                return this._class2 + ' ' +(( this._error )? 'is_not_valid' : '');
            },
            computedTitle(){
                return this._placeholder.replace('Select ', '');
            }
        },
        data() {
            return {
                API: Servers.VUE_API_SERVER,
                authToken: null,
                filterResults: false,
                minChars: 1,
                resolveOnLoad: false,
                delay: 0,
                searchable: true,
                selected_text: '',
                options: async (query, API, url, token, selected_text) => {
                    return await fetchData(query, this.API, this._url, this.authToken, this.selected_text)
                },
            }
        },
        mounted(){
            this.authToken = this.$store.state.authToken;
        },
        methods: {
            updateInput(selected_value) {
                this.$emit("update:modelValue", selected_value);
            },
            resetField(){
                this.$refs.multiselect.clear();
            },
            setSelected(selected_value) {
                try{
                    let _self = this;
                    // console.log('this.$refs.multiselect',this.$refs.multiselect, this.$refs.multiselect.$el);
                    _self.selected_text = "_searchID:"+selected_value;
                    _self.$refs.multiselect.refreshOptions(()=>{
                        _self.$refs.multiselect.select(selected_value);
                    });
                }catch(err){
                    console.log(err);
                }
            },
            getLabelValue(){
                return this.$refs.multiselect.internalValue.label;
            }
        }
    }

    
</script>

<style lang="css" scoped>
    .custom_class >>> .multiselect-placeholder {
        color: #a6a4a4 !important;
    }

    .custom_class >>> .multiselect-placeholder, 
    .custom_class >>> .multiselect-single-label,
    .custom_class >>> .multiselect-search{
        padding-left: 3px !important;
        font-family: Roboto !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        line-height: 37px !important;
    }

    .custom_class >>> .multiselect-option.is-selected.is-pointed,
    .custom_class >>> .multiselect-option.is-selected {
        background: #e91e63 !important;
    }

    .custom_class >>> .multiselect-caret {
        margin: 5px !important;
    }

    .custom_class {
        border-top: 0px !important;
        border-left: 0px !important;
        border-right: 0px !important;
    }

    .custom_class.is_not_valid >>> .multiselect-placeholder {
        color : red !important;
    }

    div.no_padding {
        padding-left : 0px !important;
        padding-right : 0px !important;
    }

    div.has_margin {
        margin-left : 12px !important;
    }
</style>