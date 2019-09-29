<template>

    <div>

        <v-container class="pt-1">

            <v-row class="justify-space-between" align="center">

                <v-col>

                    <v-icon size="33" color="#111" @click="onBack">mdi-chevron-left</v-icon>

                </v-col>

                <v-col>
                    <div class="c-page-name">
                        Иркутск
                    </div >
                </v-col>

                <v-col class="text-right">

                    <svg class=' mr-4'  width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.6888 12.1666L10.803 9.28088C11.4985 8.27695 11.8464 7.15777 11.8464 5.92392C11.8464 5.12185 11.6906 4.35476 11.3792 3.62282C11.068 2.89076 10.6473 2.25979 10.1172 1.72974C9.58718 1.19969 8.95629 0.778965 8.22439 0.467719C7.49224 0.156385 6.72521 0.000732422 5.92313 0.000732422C5.12112 0.000732422 4.35403 0.156385 3.62209 0.467719C2.89003 0.778965 2.25905 1.19969 1.729 1.72974C1.1989 2.25979 0.778233 2.89088 0.466957 3.62282C0.155652 4.35485 0 5.12185 0 5.92392C0 6.72594 0.155652 7.49277 0.466957 8.22491C0.778203 8.95685 1.1989 9.58774 1.729 10.1178C2.25905 10.648 2.89015 11.0686 3.62209 11.38C4.35411 11.6913 5.12112 11.8469 5.92313 11.8469C7.15724 11.8469 8.27625 11.4989 9.28024 10.8036L12.1661 13.6809C12.368 13.894 12.62 14.0006 12.9232 14.0006C13.2148 14.0006 13.4674 13.894 13.6804 13.6809C13.8934 13.4678 14 13.2154 14 12.9237C14.0001 12.6266 13.8964 12.3741 13.6888 12.1666ZM8.58602 8.58652C7.84846 9.3242 6.96089 9.69303 5.92313 9.69303C4.88555 9.69303 3.99799 9.32411 3.26036 8.58652C2.52274 7.84895 2.15394 6.96151 2.15394 5.92375C2.15394 4.88616 2.52283 3.99845 3.26036 3.26098C3.99784 2.52332 4.88555 2.15455 5.92313 2.15455C6.96078 2.15455 7.84834 2.52347 8.58602 3.26098C9.32371 3.99845 9.6925 4.88616 9.6925 5.92375C9.6925 6.96151 9.32359 7.84895 8.58602 8.58652Z" fill="black"/>
                    </svg>

                </v-col>

            </v-row>

        </v-container>

        <div class="c-hero-image">

            <v-img height="200px" src="../../../assets/dominos-cayman.png"></v-img>

        </div>

        <div class="c-body pa-5">


            <div class="c-item-header mb-1 d-flex">

                <div>

                    <h3 class="c-item-title">
                        {{model.name}}
                    </h3>

                    <div class="c-item-rating">

                        <svg width="8" height="8" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.84817 3.03927C6.98595 2.90499 7.03459 2.70791 6.97516 2.52471C6.91559 2.34151 6.76042 2.21073 6.56979 2.18298L4.87488 1.9367C4.80269 1.92619 4.74032 1.88092 4.70808 1.81546L3.95033 0.279776C3.86525 0.107229 3.69256 0 3.50011 0C3.3078 0 3.13511 0.107229 3.05003 0.279776L2.29214 1.8156C2.2599 1.88106 2.19739 1.92633 2.1252 1.93684L0.430287 2.18312C0.239799 2.21073 0.0844923 2.34165 0.0249209 2.52485C-0.0345105 2.70805 0.0141279 2.90513 0.151913 3.03941L1.37824 4.23476C1.43053 4.28578 1.4545 4.35923 1.44216 4.431L1.15285 6.1189C1.1272 6.26748 1.16617 6.41199 1.26233 6.52595C1.41175 6.70354 1.6726 6.75765 1.88117 6.64804L3.39695 5.85104C3.4603 5.81782 3.54006 5.8181 3.60327 5.85104L5.11919 6.64804C5.19292 6.68686 5.27156 6.70649 5.35271 6.70649C5.50087 6.70649 5.64132 6.64061 5.7379 6.52595C5.83419 6.41199 5.87302 6.2672 5.84737 6.1189L5.55792 4.431C5.54559 4.35909 5.56955 4.28578 5.62184 4.23476L6.84817 3.03927Z" fill="white"/>
                        </svg>

                        {{model.rating}}

                    </div>

                </div>



            </div>

            <div class="c-item-teaser mb-4">

                <div>

                    <span class="black--text ">Позы </span>– это национальное блюдо бурятской и монгольской кухни, имеющее сходство с хинкали и мантами.
                </div>
                <div class="mt-2">

                    <span class="black--text ">Байкальский омуль </span>– это национальное блюдо бурятской и монгольской кухни, имеющее сходство с хинкали и мантами.
                </div>



            </div>



            <div class="c-menu mt-4">

                <div class="c-menu-cat mb-3" v-for="catItem in menuCats">

                    <div class="c-menu-cat-title">

                        <h3>{{catItem.title}}</h3>

                    </div>

                    <div class="c-menu-items">

                        <CatalogMenuItem :item="menuItem" v-for="menuItem in menuCatItems(catItem)" class="py-5 c-menu-item">

                        </CatalogMenuItem>

                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>

    import CatalogMenuItem from './../common/catalog/item'

    export default {
        components: {
            CatalogMenuItem
        },
        data: () => ({
            pageTitle: 'Каталог',

            cats: [
                {
                    id: 1,
                    title: 'Позы'
                },
                {
                    id: 2,
                    title: 'Омуль'
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
                {
                    id: 6,
                    title: 'Категория 6'
                },
                {
                    id: 7,
                    title: 'Категория 7'
                },
            ],

            model: {
                id: 1,
                name: 'Иркутская Область',
                rating: 3.4,
                min_price: 400,
                teaser: 'Международная сеть ресторанов фастфуда, которая входит в число',
                image: '',
                cats: [1]
            },

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
            ]

        }),

        methods: {

            menuCatItems(cat) {

                return this.menu.filter((menuItem)=>{
                    return menuItem.cats.indexOf(cat.id) > -1
                });
            },

            onBack() {
                this.$router.go(-1);
            },
            getRandomInt(min, max) {
                return Math.floor(Math.random() * (max - min)) + min;
            }

    },
        computed: {
            menuCats() {

                return this.cats.filter((cat)=>{
                    return this.menu.find((menuItem)=>{
                        return menuItem.cats.indexOf(cat.id) > -1
                    })
                });
            },

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


