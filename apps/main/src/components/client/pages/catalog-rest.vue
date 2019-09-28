<template>

    <div>

        <div class="c-hero-image">

            <v-img height="200px" src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"></v-img>

        </div>

        <div class="c-body pa-5">


            <v-row no-gutters class="c-header">

                <v-col cols="7">

                    <h3 class="c-item-title mb-2">{{model.name}}</h3>

                </v-col>

                <v-col cols="3" class="text-right">


                </v-col>

            </v-row>

            <div class="c-item-teaser mb-4">
                {{model.teaser}}
            </div>

            <div class="c-item-price">Минимальная сумма заказа от <span class="value">{{model.min_price}} ₽</span></div>

            <div class="c-menu">

                <div class="c-menu-cat" v-for="catItem in menuCats">

                    <div class="c-manu-cat-title">
                        <h3>{{catItem.title}}</h3>
                    </div>

                    <div class="c-manu-cat-items">

                        <CatalogMenuItem :item="menuItem" v-for="menuItem in menuCatItems(catItem)">

                        </CatalogMenuItem>

                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>

    import CatalogMenuItem from './../common/catalog-menu-item'

    export default {
        components: {
            CatalogMenuItem
        },
        data: () => ({
            pageTitle: 'Каталог',

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
                name: 'Pizza Italy',
                rating: 3.4,
                min_price: 400,
                teaser: 'Международная сеть ресторанов фастфуда, которая входит в число',
                image: '',
                cats: [1]
            },

            menu: [
                {
                    title: 'Филадельфия',
                    weight: 200,
                    price: 235,
                    desc: 'Лосось, рис, сыр филадельфия',
                    cats: [1]
                },

                {
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

    .c-body {

        background: #FFFFFF;
        box-shadow: 0px 4px 35px rgba(0, 0, 0, 0.08);
        border-radius: 22px 22px 0px 0px;
        margin-top: -20px;
        z-index: 20;
        position: relative;
    }

    .c-item-title{
        font-size: 18px;
        font-weight: 600;
        color: #111;
    }

    .c-item-teaser {
        color: #bdbdbd;
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

</style>
