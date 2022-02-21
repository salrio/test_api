<template>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend" :class="{'col-sm-1 no_padding' : _no_padding}">
                <span class="input-group-text">
                    <i class="material-icons">{{ _icon }}</i>
                </span>
            </div>
            <div :class="{'col-sm-11' : _no_padding}">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BaseCustomField",
        props: {
            _icon: {
                type: String,
                default: "face",
            },
            _no_padding: {
                type: Boolean,
                default: false,
            }
        },
        methods: {
            updateInput(event) {
                this.$emit("update:modelValue", event.target.value);
                console.log(event.target.value);
            }
        }
    };
</script>

<style scoped>
    div.form-group {
        padding-bottom: 0px !important;
    }
</style>