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
                :options="_options"
                :title="computedTitle"
                @change="updateInput" 
            />
        </div>
    </div>
</template>

<script>
    import Multiselect from '@vueform/multiselect'
    import '@vueform/multiselect/themes/default.css';

    export default {
        name: "BaseSelectLocal",
        props: {
            _options: {
                type: Array,
                required: true
            },
            _class: {
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
                return ( this._error )? 'is_not_valid' : '';
            },
            computedTitle(){
                return this._placeholder.replace('Select ', '');
            }
        },
        methods: {
            updateInput(selected_value) {
                this.$emit("update:modelValue", selected_value);
            },
            resetField(){
                this.$refs.multiselect.clear();
            },
            setSelected(selected_value) {
                this.$refs.multiselect.select(selected_value);
            },
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
</style>