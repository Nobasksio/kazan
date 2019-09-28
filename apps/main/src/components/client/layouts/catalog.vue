<template>

    <div>


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
export default {
  data: () => ({
      drawer: true
  }),
};
</script>
