<template>

    <div>

        <AppCommon :showBasketHandler="true"></AppCommon>

        <v-content>

            <v-container
                    class="fill-height pa-0"
                    fluid
            >
                <div style="width: 100%">

                    <router-view/>

                </div>

            </v-container>
            <dostW></dostW>
        </v-content>
    </div>

</template>

<script>

import AppCommon from './../common/common'

import dostW from './../common/dost-widget'

export default {
  components: {
      AppCommon,
      dostW
  },
  data: () => ({
      drawer: true
  }),
};

</script>
