<template>

    <div class="com">

        <v-row no-gutters class="c-header">

            <v-col cols="4">

                <img :src="item.image" class="c-image">

            </v-col>

            <v-col cols="8" >

                <div class="c-title">

                    {{item.title}}

                    <span class="c-weight">{{item.weight}}</span>

                </div>

                <div class="c-teaser">

                    {{item.teaser}}

                </div>

                <div class="c-sale">

                    <v-btn outlined>{{item.price}}</v-btn>

                </div>

            </v-col>

        </v-row>


    </div>

</template>

<script>


    export default {
        props: {
            item: {}
        },
        components: {

        },
        data: () => ({
            pageTitle: 'Каталог',

        }),

        methods: {


        },
        computed: {

        },
    };
</script>

<style lang="scss" scoped>


    .c-image {

    }

</style>
