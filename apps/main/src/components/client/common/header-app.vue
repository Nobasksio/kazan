<template >
    <v-container class="com pt-1">
        <v-row class="justify-space-between">

            <v-col>

                <svg class='mt-3 ml-4' width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg" @click="onShowNav">
                    <rect width="16" height="2" rx="1" fill="black"/>
                    <rect y="6" width="12" height="2" rx="1" fill="black"/>
                    <rect y="12" width="8" height="2" rx="1" fill="black"/>
                </svg>

            </v-col>

            <v-col>
                <v-btn rounded class="red darken-1 white--text my-bold overflow-hidden max text-right" >
                    Иркутск -> Казань
                </v-btn >
            </v-col>

            <v-col class="text-right">
              

            </v-col>
        </v-row>
    </v-container>
</template >

<script >
    export default {
        methods: {
            onShowNav() {
                this.$bus.emit('showNav');
            }
        }
    }
</script >

<style scoped >

    .com {
        background: #FFF;
    }

</style >
