<template>

    <div>

        <AppCommon :showBasketHandler="false"></AppCommon>

        <v-content>

            <v-container
                    class="fill-height pa-0"
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
