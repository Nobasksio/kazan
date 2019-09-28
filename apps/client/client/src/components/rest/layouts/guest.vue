<template>

    <div>

        <v-content>
            <v-container
                    class="fill-height"
                    fluid
            >
                <router-view/>

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
