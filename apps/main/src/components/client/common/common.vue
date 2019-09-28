<template >
    <div>

        <v-navigation-drawer
                             fixed
                             temporary
                             :value="true"
                             width="352"
        >

            <div class="closer">

                <a >

                </a>

            </div>

            <v-list class="c-list">


                <v-list-item to="/cabinet">
                    <v-list-item-title>Ваш профиль</v-list-item-title>
                </v-list-item>

                <v-list-item to="/cabinet">
                    <v-list-item-title>Статус текущего заказа</v-list-item-title>
                </v-list-item>

                <v-list-item to="/">
                    <v-list-item-title>Каталог</v-list-item-title>
                </v-list-item>

                <v-list-item to="/promotions/">
                    <v-list-item-title>Акции</v-list-item-title>
                </v-list-item>

                <v-list-item to="/delivery/">
                    <v-list-item-title>Доставка и оплата</v-list-item-title>
                </v-list-item>

                <v-list-item to="/bonus/">
                    <v-list-item-title>Бонусы</v-list-item-title>
                </v-list-item>

            </v-list>

        </v-navigation-drawer>

    </div>

</template >

<script >
    export default {
        name: "header"
    }
</script >

<style scoped >

    .com {
        background: #FFF;
    }

</style >
