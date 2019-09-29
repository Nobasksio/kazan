<template>

    <div>

        <AppHeaderBack>

            <template v-slot:center>
                <div class="c-page-name">
                    {{currentStationName}}
                </div >
            </template>

        </AppHeaderBack>


        <template v-if="!result.loaded">

            <div class="text-center mt-10">

                <v-progress-circular
                        color="primary"
                        indeterminate
                ></v-progress-circular>

            </div>

        </template>
        <template v-else>

            <div class="c-hero-image">

                <v-img height="200px" :src="`/images/rest${restId}.jpg`"></v-img>

            </div>

            <div class="c-body pa-5">


                <div class="c-item-header mb-1 d-flex">

                    <div>

                        <h3 class="c-item-title">
                            {{result.rest.name}}
                        </h3>

                        <div class="c-item-rating">

                            <svg width="8" height="8" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.84817 3.03927C6.98595 2.90499 7.03459 2.70791 6.97516 2.52471C6.91559 2.34151 6.76042 2.21073 6.56979 2.18298L4.87488 1.9367C4.80269 1.92619 4.74032 1.88092 4.70808 1.81546L3.95033 0.279776C3.86525 0.107229 3.69256 0 3.50011 0C3.3078 0 3.13511 0.107229 3.05003 0.279776L2.29214 1.8156C2.2599 1.88106 2.19739 1.92633 2.1252 1.93684L0.430287 2.18312C0.239799 2.21073 0.0844923 2.34165 0.0249209 2.52485C-0.0345105 2.70805 0.0141279 2.90513 0.151913 3.03941L1.37824 4.23476C1.43053 4.28578 1.4545 4.35923 1.44216 4.431L1.15285 6.1189C1.1272 6.26748 1.16617 6.41199 1.26233 6.52595C1.41175 6.70354 1.6726 6.75765 1.88117 6.64804L3.39695 5.85104C3.4603 5.81782 3.54006 5.8181 3.60327 5.85104L5.11919 6.64804C5.19292 6.68686 5.27156 6.70649 5.35271 6.70649C5.50087 6.70649 5.64132 6.64061 5.7379 6.52595C5.83419 6.41199 5.87302 6.2672 5.84737 6.1189L5.55792 4.431C5.54559 4.35909 5.56955 4.28578 5.62184 4.23476L6.84817 3.03927Z" fill="white"/>
                            </svg>

                            4.5

                        </div>

                    </div>

                    <div class="ml-auto">

                        <div class="c-item-timer">

                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="15" height="15" rx="4" fill="#F2994A"/>
                                <path d="M7.5 2C4.475 2 2 4.475 2 7.5C2 10.525 4.475 13 7.5 13C10.525 13 13 10.525 13 7.5C13 4.475 10.525 2 7.5 2ZM7.5 11.9C5.08 11.9 3.1 9.92 3.1 7.5C3.1 5.08 5.08 3.1 7.5 3.1C9.92 3.1 11.9 5.08 11.9 7.5C11.9 9.92 9.92 11.9 7.5 11.9Z" fill="white"/>
                                <path d="M7.77507 4.75H6.95007V8.05L9.81007 9.81L10.2501 9.095L7.77507 7.61V4.75Z" fill="white"/>
                            </svg>


                            <span class="c-item-timer-value">
                                00:30:21
                            </span>

                        </div>

                    </div>

                </div>

                <div class="c-item-teaser mb-4">

                    {{result.rest.description || 'Международная сеть ресторанов фастфуда, которая входит в число'}}

                </div>

                <div class="c-item-price">Минимальная сумма заказа от <span class="value">500 ₽</span></div>

                <div class="c-menu mt-4">

                    <div class="c-menu-cat mb-3" v-for="catItem in menuCats">

                        <div class="c-menu-cat-title">

                            <h3>{{catItem.name}}</h3>

                        </div>

                        <div class="c-menu-items">

                            <CatalogMenuItem :item="menuItem" v-for="menuItem in getCatProducts(catItem)" class="py-5 c-menu-item">

                            </CatalogMenuItem>

                        </div>

                    </div>

                </div>

            </div>

        </template>

    </div>

</template>

<script>
    import axios from 'axios'

    import CatalogMenuItem from './../common/catalog/item'

    import dostW from './../common/dost-widget'

    export default {
        components: {
            CatalogMenuItem,
            dostW
        },
        data: () => ({
            pageTitle: 'Каталог',

            restId: null,

            cats: [
                {
                    id: 1,
                    title: 'Суши'
                },
                {
                    id: 2,
                    title: 'Пицца'
                },
                {
                    id: 3,
                    title: 'Бургеры'
                },
                {
                    id: 4,
                    title: 'Горячее'
                },
                {
                    id: 5,
                    title: 'Категория 5'
                },
            ],

            menu: [
                {
                    id: 1,
                    title: 'Филадельфия',
                    weight: 200,
                    price: 235,
                    desc: 'Лосось, рис, сыр филадельфия',
                    cats: [1]
                },
                {
                    id: 2,
                    title: 'Филадельфия',
                    weight: 200,
                    price: 235,
                    desc: 'Лосось, рис, сыр филадельфия',
                    cats: [1]
                },
                {
                    id: 3,
                    title: 'Мясная',
                    weight: 200,
                    price: 235,
                    desc: 'Томатный соус, сыр моцарелла, ароматная свинина, пепперони, ветчина, бекон, чоризо...',
                    cats: [2]
                }
            ],

            model: {
                id: 1,
                name: 'Pizza Italy',
                rating: 3.4,
                min_price: 400,
                teaser: 'Международная сеть ресторанов фастфуда, которая входит в число',
                image: '',
                cats: [1]
            },


            result: {
                rest: {},
                products: [],
                loaded: false
            }
        }),

        methods: {

            getCatProducts(cat) {
                return this.result.products.filter((product)=>{
                    return product.product_cat.id == cat.id
                });
            },

            onBack() {
                this.$router.go(-1);
            },
            getRandomInt(min, max) {
                return Math.floor(Math.random() * (max - min)) + min;
            },

            async load(params) {

                this.restId = params.id

                axios.get(`/api/rest/${this.restId}/load`, {}).then(({data}) => {

                    this.result.rest = data.rest
                    this.result.products = data.products

                    this.result.loaded = true

                })
            }

        },
        computed: {
            menuCats() {

                let cats = {};
                let result = [];

                this.result.products.forEach((product)=>{
                    cats[product.product_cat.id] = product.product_cat
                });

                for (let key in cats) {
                    result.push(cats[key])
                }

                return result;
            },
            currentStationName() {
                return window.localStorage['currentRouteStationName']
            }
        },


        mounted() {

            this.load(this.$route.params);
        },

    };
</script>

<style lang="scss" scoped>

    .c-page-name {
        color: #EE3124;
        text-align: center;
    }

    .c-body {

        background: #FFFFFF;
        box-shadow: 0px 4px 35px rgba(0, 0, 0, 0.08);
        border-radius: 22px 22px 0px 0px;
        margin-top: -20px;
        z-index: 20;
        position: relative;
    }

    .c-item-header {

        margin: 0 0 0 0;

        .c-item-title {
            font-size: 23px;
            font-weight: 600;
            color: #111;
            display: inline;
        }

        .c-item-rating {
            display: inline-block;
            background: #EE3124;
            border-radius: 3px;
            font-size: 14px;
            color: #fff;
            padding: 2px 5px 4px 5px;
            line-height: 1;
            margin: 8px 0 0 4px;
            position: relative;
            vertical-align: top;

            svg {
                margin: -2px 2px 0 0 ;
                vertical-align: middle;
            }
        }

        .c-item-timer {
            padding: 5px 10px;
            background: #FFFFFF;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
            border-radius: 6px;
            font-size: 12px;
            line-height: 1;
            color: #F2994A;


            span {
                vertical-align: middle;
            }

            svg {
                display: inline-block;
                vertical-align: middle;
                margin-right: 2px;
            }
        }
    }


    .c-item-teaser {
        color: #bdbdbd;
        font-size: 15px;
    }

    .c-item-price {
        font-size: 13px;
        color: #bdbdbd;

        .value {
            font-size: 14px;
            color: #111;
            font-weight: 600;
        }
    }

    .c-item-gerb {
        background: #fff;
        box-shadow: 0px 4px 35px rgba(0, 0, 0, 0.08);
        display: inline-block;
        line-height: 0;
        border-radius: 9px 9px 0px 0px;

    }

    .c-menu-item {

        &:not(:last-child) {
            border-bottom: 1px solid #E0E0E0;
        }
    }

</style>


