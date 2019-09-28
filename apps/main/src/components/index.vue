<template>
    <v-content>
        <v-container
                class="fill-height"
                fluid
        >

            <ul>
                <li><router-link to="/rest/cabinet/">Кабинет поставщика</router-link></li>
                <li><router-link to="/manage/cabinet/">Кабинет РЖД</router-link></li>
                <li><router-link to="/client/cabinet/">Кабинет клиента</router-link></li>
            </ul>


        </v-container>
    </v-content>
</template>

<script>
export default {
  data: () => ({

  }),
};
</script>
