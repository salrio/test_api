<template>
    <div class="form-group" :class="_size">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons">{{ _icon }}</i>
                </span>
            </div>
            <input
                :class="{ 'form-control':(_type !== 'color'), input_required: _error }"
                :type="_type"
                :value="modelValue"
                :placeholder="_placeholder"
                :title="_placeholder"
                @input="updateInput"
            />
            <small v-if="_sublabel" class="sublabel">{{ _sublabel }}</small>
        </div>
    </div>
</template>

<script>
    

    export default {
        name: "BaseInput",
        props: {
            _size: {
                type: String,
                default: "col-sm-12",
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
            _sublabel: {
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
        methods: {
            updateInput(event) {
                if( this._type == 'number' ){
                    if( isNaN(event.data) ){
                        event.target.value = this.modelValue;
                    }
                }
                this.$emit("update:modelValue", event.target.value);
            }
        }
    };
</script>

<style scoped>
    .input_required::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: red !important;
        opacity: 1 !important;
    }
    div.form-group {
        padding-bottom: 0px !important;
    }
    small.sublabel {
        font-family: sans-serif !important;
        color: #aaaaaa !important;
        line-height: 2 !important;
        margin-left: 10px !important;
    }
</style>