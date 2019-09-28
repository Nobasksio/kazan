<template>

    <div class="com">

        <v-dialog
                max-width="390"
                scrollable
                v-model="dialog"
        >
            <v-card class="c-basket">

                <v-card-title class="c-header d-flex">

                    <div class="c-title">

                        Корзина

                    </div>

                    <div class="ml-auto">

                        <svg @click="dialog=false" class="s-pointer" fill="none" height="11" viewBox="0 0 11 11"
                             width="11" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.47283 5.50086L10.7984 1.17525C11.0672 0.906732 11.0672 0.471052 10.7984 0.202536C10.5297 -0.0662099 10.0945 -0.0662099 9.82573 0.202536L5.50011 4.52815L1.17427 0.202536C0.905526 -0.0662099 0.470305 -0.0662099 0.201559 0.202536C-0.0671864 0.471052 -0.0671864 0.906732 0.201559 1.17525L4.5274 5.50086L0.201559 9.82648C-0.0671864 10.095 -0.0671864 10.5307 0.201559 10.7992C0.335932 10.9333 0.512039 11.0005 0.687916 11.0005C0.863793 11.0005 1.0399 10.9333 1.17427 10.799L5.50011 6.47335L9.82573 10.799C9.9601 10.9333 10.1362 11.0005 10.3121 11.0005C10.488 11.0005 10.6641 10.9333 10.7984 10.799C11.0672 10.5304 11.0672 10.0948 10.7984 9.82625L6.47283 5.50086Z"
                                  fill="black"/>
                        </svg>

                    </div>

                </v-card-title>

                <v-card-text>

                    <div class="c-main">

                        <basket-items
                                :itemIs="itemIs"
                                :itemsMaxHeight="itemsMaxHeight"
                        ></basket-items>

                    </div>

                </v-card-text>

                <div class="c-sale" ref="sale" v-if="items.length">

                    <div class="c-sale-title">
                        Заполните поля
                    </div>


                    <div class="c-sale-form mb-7">

                        <v-text-field
                                label="Телефон"
                                outlined
                                required
                                v-model="order.phone"
                                class="s-cab mb-4"
                        ></v-text-field>


                        <v-text-field
                                label="Комментарий"
                                outlined
                                v-model="order.comment"
                                class="s-cab"
                        ></v-text-field>

                    </div>

                    <div class="с-sale-pay">

                        <v-btn block color="#EE3124" dark>

                            Оплатить

                            <div class="c-sale-price">
                                {{$store.getters['client_basket/priceDisplay']}} &#8381;
                            </div>

                        </v-btn>

                    </div>

                </div>

            </v-card>

        </v-dialog>


        <div class="c-handler" v-if="showBasketHandler">

            <v-btn block color="#EE3124" dark rounded @click="dialog=true">

                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-3" >
                    <path d="M20.87 8.5293C20.4102 7.95352 19.7829 7.63555 19.104 7.63555H17.5528C17.4067 3.65664 14.5235 0.472656 11.0001 0.472656C7.47663 0.472656 4.59343 3.65664 4.44733 7.63555H2.89616C2.21726 7.63555 1.58991 7.95352 1.13015 8.5293C0.550069 9.25117 0.339522 10.2566 0.558662 11.2234L2.41921 19.4219C2.69851 20.6594 3.66101 21.5273 4.75671 21.5273H17.2391C18.3348 21.5273 19.2973 20.6637 19.5766 19.4219L21.4415 11.2234C21.6606 10.2566 21.4501 9.25117 20.87 8.5293ZM11.0001 2.22578C13.561 2.22578 15.6579 4.62344 15.7954 7.63555H6.20476C6.34226 4.62773 8.43913 2.22578 11.0001 2.22578ZM19.7313 10.8324L17.8708 19.0352C17.7762 19.4562 17.5055 19.7742 17.2434 19.7742H4.75671C4.4946 19.7742 4.2239 19.4562 4.12937 19.0352L2.26882 10.8324C2.16999 10.3984 2.10983 9.38867 2.89616 9.38867H19.104C19.9505 9.38867 19.8301 10.3984 19.7313 10.8324Z" fill="white"/>
                    <path d="M6.64731 11.1333C6.16177 11.1333 5.77075 11.5243 5.77075 12.0099V17.4884C5.77075 17.9739 6.16177 18.3649 6.64731 18.3649C7.13286 18.3649 7.52388 17.9739 7.52388 17.4884V12.0099C7.52817 11.5286 7.13286 11.1333 6.64731 11.1333Z" fill="white"/>
                    <path d="M10.897 11.1333C10.4114 11.1333 10.0204 11.5243 10.0204 12.0099V17.4884C10.0204 17.9739 10.4114 18.3649 10.897 18.3649C11.3825 18.3649 11.7735 17.9739 11.7735 17.4884V12.0099C11.7735 11.5286 11.3782 11.1333 10.897 11.1333Z" fill="white"/>
                    <path d="M15.1423 11.1333C14.6568 11.1333 14.2657 11.5243 14.2657 12.0099V17.4884C14.2657 17.9739 14.6568 18.3649 15.1423 18.3649C15.6279 18.3649 16.0189 17.9739 16.0189 17.4884V12.0099C16.0189 11.5286 15.6279 11.1333 15.1423 11.1333Z" fill="white"/>
                </svg>

                {{$store.getters['client_basket/priceDisplay']}}   &#8381;

            </v-btn>

        </div>

    </div>

</template>

<script>

    import BasketItems from "./items";

    export default {
        components: {
            BasketItems,
        },
        mixins: [],
        props: {
            showBasketHandler: {
                default: true
            },
            itemIs: {
                default: 'item'
            },
            theme: {
                default: 'default'
            }
        },
        data() {
            return {
                dialog: false,
                itemsMaxHeight: 300,
                calcDeliveryTimeProc: false,

                order: {
                    phone: '',
                    comment: ''
                }
            }
        },
        created() {
            //this.$eventHub.$on('order/current/update', () => this.onOrderUpdate());
        },
        beforeDestroy() {
            //this.$eventHub.$off('order/current/update');
        },

        methods: {},
        computed: {
            items() {
                return this.$store.getters['client_basket/items'];
            }
        },
        watch: {},
        mounted: function () {

        }
    }
</script>

<style lang="scss" scoped>


    .c-basket {

        .c-header {

            .c-title {
                padding: 0;
                margin: 0;
                font-size: 21px;
                font-weight: 800;
            }

            .inner {
                width: 100%;
                display: flex;
                border-bottom: 1px solid #EEE;
                position: relative;
                height: 78px;

                &:after {
                    content: "";
                    position: absolute;
                    z-index: 1;
                    top: 100%;
                    bottom: 0;
                    width: 210%;
                    height: 16px;
                    left: -55%;
                    right: -55%;
                    background: radial-gradient(ellipse at 50% -18%, rgba(0, 0, 0, 0.5), rgba(97, 97, 97, 0) 40%);
                }
            }
        }

        .c-main {
            margin: 0px 0 0 0;
            padding: 0;
        }


        .c-amount {
            padding: 0px 0 0 0;
            margin: 0px 0px 7px 0px;
            display: flex;
        }

        .c-amount-caption {
            font-size: 18px;
            font-weight: 500;
            margin-top: auto;
            margin-bottom: auto;
        }

        .c-amount-value {
            font-size: 27px;
            font-weight: 600;
            margin-top: auto;
            margin-bottom: auto;
            margin-left: auto;
        }

        .c-sale {
            border-top: 3px solid #E0E0E0;
            padding: 20px 24px 20px 20px;
        }

        .c-sale-title {
            font-size: 19px;
            font-weight: 800;
            color: #000;
            padding: 0px 0 16px 0;
            text-align: center;
        }

        .c-sale-form {

        }

        .с-sale-pay {

            .v-btn {
                border-radius: 13px;
                height: 50px;
                overflow: hidden;

                ::v-deep {
                    .v-btn__content {
                        position: static;
                    }
                }

                .c-sale-price {

                    position: absolute;
                    right: 0;
                    top: 0;
                    padding: 15px 15px;
                    background-color: #C41E13;
                }
            }
        }


    }

    .c-handler {

        display: inline-block;
        position: fixed;
        bottom: 20px;
        z-index: 200;

        left: 50%;
        transform: translateX(-50%);

        svg {

        }

        .v-btn {
            height: 41px;
            font-size: 19px;
            font-weight: 400;
        }
    }

</style>
