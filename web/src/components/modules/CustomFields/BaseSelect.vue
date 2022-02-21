<template>
    <div class="form-group" v-if="options">
        <div class="input-group">
            <div class="input-group-prepend col-sm-1" :class="_class">
                <span class="input-group-text">
                    <i class="material-icons">{{ _icon }}</i>
                </span>
            </div>
            <div class="col-sm-11">
                <select 
                    class="form-control _select_field"
                    :class="computedClass"
                    data-style="btn btn-link" 
                    :value="modelValue"
                    :title="_placeholder"
                    @change="updateInput">
                        <option v-if="_placeholder" value="" disabled selected>{{ _placeholder }}</option>
                        <option v-if="options[0].id" v-for="option in options" :key="option.id" :value="option.id" :selected="option.id === modelValue">{{ option.name }}</option>
                        <option v-else v-for="option in options" :key="option" :selected="option === modelValue">{{ option }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BaseSelect",
        props: {
            options: {
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
            _type: {
                type: String,
                default: "text",
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
        computed: {
            computedClass() {
                if( this._error ){
                    return 'is_not_valid';
                }
                else{
                    return ( this.modelValue )? 'not_empty' : '';
                }
            }
        },
        methods: {
            updateInput(event) {
                this.$emit("update:modelValue", event.target.value);
                var dropdown = $("select[title='"+this._placeholder+"']");
                dropdown.removeClass('is_not_valid');
                dropdown.addClass('not_empty');
            }
        }
    };
</script>

<style scoped>
    ._select_field{
        color : #a0a0a0;
        width : 95%;
    }
    ._select_field.not_empty{
        color : #495057 !important;
    }
    ._select_field.is_not_valid{
        color : red !important;
    }
    option{
        color : #a0a0a0;
    }
    div.form-group {
        padding-bottom: 0px !important;
    }
    div.no_padding {
        padding-left : 0px !important;
        padding-right : 0px !important;
    }
</style>