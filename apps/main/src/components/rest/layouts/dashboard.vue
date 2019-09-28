<template>

    <div>

        <v-app-bar
                app
                color="indigo"
                dark
        >
            <v-toolbar-title>Кабинет ресторана</v-toolbar-title>
        </v-app-bar>

        <v-navigation-drawer
                v-model="drawer"
                app

        >
            <v-list dense>

                <v-list-item to="/rest/cabinet/profile">
                    <v-list-item-title>Профиль</v-list-item-title>
                </v-list-item>

                <v-list-item to="/rest/cabinet/legal/list">
                    <v-list-item-title>Юридические лица</v-list-item-title>
                </v-list-item>

                <v-list-item to="/rest/cabinet/contract/list">
                    <v-list-item-title>Договора</v-list-item-title>
                </v-list-item>

                <v-list-item to="/rest/cabinet/rest/list">
                    <v-list-item-title>Рестораны</v-list-item-title>
                </v-list-item>

                <v-list-item to="/rest/cabinet/menu/list">
                    <v-list-item-title>Меню</v-list-item-title>
                </v-list-item>


                <v-list-group
                >
                    <template v-slot:activator>

                        <v-list-item-title>Заказы</v-list-item-title>

                    </template>

                    <div class="pl-3">

                        <v-list-item to="/rest/cabinet/order/list/queue">
                            <v-list-item-title>Очередь</v-list-item-title>
                        </v-list-item>

                        <v-list-item to="/rest/cabinet/order/list/all">
                            <v-list-item-title>Архив</v-list-item-title>
                        </v-list-item>

                    </div>

                </v-list-group>


                <v-list-group
                        value="true"
                >
                    <template v-slot:activator>

                        <v-list-item-title>Отчеты</v-list-item-title>

                    </template>

                    <div class="pl-3">

                        <v-list-item to="/rest/cabinet/report/orders">
                            <v-list-item-title>По заказам</v-list-item-title>
                        </v-list-item>

                    </div>

                </v-list-group>

            </v-list>

        </v-navigation-drawer>

        <v-content>



            <v-container
                    class="fill-height"
                    fluid
            >
                <div style="width: 100%">

                    <router-view/>

                </div>

            </v-container>

        </v-content>

    </div>

</template>

<script>
export default {
  data: () => ({
      drawer: true
  }),
};
</script>
