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
                    Ваш профиль
                </v-list-item>

                <v-list-item to="/rest/cabinet/rest/list">
                    Ваши рестораны
                </v-list-item>

                <v-list-item to="/rest/cabinet/menu/list">
                    Меню
                </v-list-item>

                <v-list-item to="/rest/cabinet/order/list">
                    Заказы
                </v-list-item>

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
