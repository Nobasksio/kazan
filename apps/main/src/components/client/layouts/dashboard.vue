<template>

    <div>
        <v-app-bar
                app
                color="indigo"
                dark
        >
            <v-toolbar-title>Кабинет клиента</v-toolbar-title>
        </v-app-bar>

        <v-navigation-drawer
                v-model="drawer"
                app
        >

            <v-list dense>

                <v-list-item to="/client/cabinet/profile">
                  Ваш профиль
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
