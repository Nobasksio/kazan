<template>

    <div class="com">


        <v-row no-gutters class="c-header">

            <v-col cols="5" class="pr-3">

                <img :src="`/images/product${item.id}.jpg`" class="c-image">

            </v-col>

            <v-col cols="7" >

                <div class="c-title mb-2">

                    {{item.name}}

                    <span class="c-weight" v-if="item.ves">{{item.ves}} гр.</span>

                </div>

                <div class="c-desc" v-if="item.description">

                    {{item.description}}

                </div>

                <div class="c-sale mt-3 d-flex">

                    <v-btn class="c-sale-basket-minus" outlined @click="onBasketMinus" v-if="addedToBasket">-</v-btn>

                    <v-btn class="c-sale-basket-add" outlined @click="onBasketAdd" >

                        {{item.price}} &#8381;

                        <span v-if="addedToBasket">x {{addedToBasket}}</span>
                    </v-btn>

                </div>

            </v-col>

        </v-row>

    </div>

</template>

<script>

    export default {
        props: {
            item: {}
        },
        components: {

        },
        data: () => ({
            pageTitle: 'Каталог',

        }),

        computed: {

            addedToBasket() {

                let basketItem = this.$store.getters['client_basket/itemsByProductId'] ? this.$store.getters['client_basket/itemsByProductId'][this.item.id] : null;

                return basketItem ? basketItem.quantity : 0;
            },

        },

        methods: {

            onBasketAdd() {
                this.$store.dispatch('client_basket/itemAdd', [this.item]);
            },

            onBasketMinus() {

                if (this.addedToBasket > 0) {
                    this.$store.dispatch('client_basket/productQuantity', [this.item, this.addedToBasket - 1]);
                }

            }

        },
    };

</script>

<style lang="scss" scoped>


    .c-image {

        max-width: 100%;
    }

    .c-title {
        font-size: 17px;
        font-weight: 700;
    }

    .c-weight {
        font-size: 13px;
        color: #bdbdbd;
        font-weight: 400;
        margin-left: 10px;
    }

    .c-desc {
        color: #BDBDBD;
        font-size: 14px;
        line-height: 24px
    }

    .c-sale-basket-add {
        background: #FFFFFF;
        box-sizing: border-box;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        border: 2px solid #EE3124;
        color: #EE3124 !important;
        border-radius: 22px;
        text-transform: none;
        font-weight: 600 !important;
        font-size: 16px;
        min-width: auto;
        padding: 0 16px !important;
        line-height: 1;

        &:before {
            display: none;
        }
    }

    .c-sale-basket-minus {
        margin-right: -30px;
        background: #FFFFFF;
        box-sizing: border-box;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1) !important;
        border: 0;
        color: #EE3124 !important;
        border-radius: 22px;
        text-transform: none;
        font-weight: 600 !important;
        font-size: 20px;
        min-width: auto !important;
        padding: 0 40px 0 20px !important;
        line-height: 1;

        &:before {
            display: none;
        }
    }

</style>
