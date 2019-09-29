<template>

    <div>

    <v-row class="flex-column">
        <v-col class="text-center">
            Спасибо!<br>
            Номер вашего заказа
        </v-col>

        <v-col class="text-center">
            # 002
        </v-col>
        <v-col class="text-center">
            <img src="./../../../assets/man.png" alt="" >
        </v-col>
        <v-col class="text-center">

        </v-col>
    </v-row>

    </div>

</template>

<script>

import AppCommon from './../common/common'

export default {
  components: {
      AppCommon
  },
  data: () => ({
      drawer: true
  }),
};

</script>
