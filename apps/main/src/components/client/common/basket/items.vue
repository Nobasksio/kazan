<template>

    <div @mouseover="mouseOver" v-bind="getContainerAttrs()">

        <div class="c-items" >

            <div :style="{'max-height' : itemsMaxHeight + 'px'}" class="c-items-scroll">

                <div class="c-items-inner">

                    <input class="c-focus" ref="focus" type="text"></input>

                    <div class="c-items-empty" v-if="!items.length">
                        Вы пока ничего не выбрали
                    </div>

                    <component :is="itemIs"
                               :item="item"
                               :key="item.ID"
                               @itemQuantity="onItemQuantity"
                               @itemRemove="onItemRemove"
                               v-for="item in items"
                    ></component>

                </div>

            </div>

        </div>

    </div>

</template>
<script>

    import Item from "./item";

    export default {
        components: {
            Item
        },
        props: {
            theme: {},
            itemIs: {default: 'item'},
            itemsMaxHeight: {},
        },
        data() {
            return {}
        },
        methods: {
            onItemRemove(item) {
                this.$store.dispatch('client_basket/itemRemove', item);

                this.$emit('change');
            },
            onItemQuantity(item, quantity) {
                this.$store.dispatch('client_basket/itemQuantity', [item, quantity]);

                this.$emit('change');
            },
            mouseOver: function () {

                if (this.$refs.focus)
                    this.$refs.focus.value = Date.now();
            },
            getContainerAttrs() {

                let result = {
                    class: {}
                };

                result.class['theme-' + this.theme] = true;

                return result
            },
        },
        computed: {
            items() {
                return this.$store.getters['client_basket/items'];
            }
        },
        watch: {},
    }
</script>

<style lang="scss" scoped>

    .c-focus {
        height: 0;
        width: 0;
        overflow: hidden;
        font-size: 0;
        visibility: hidden;
        position: absolute;
    }


    .c-items {

        .c-items-inner {
            padding: 5px 0;
        }

    }


</style>
