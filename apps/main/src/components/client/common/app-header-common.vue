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
                    {{currentTrainName}}
                </v-btn >
            </v-col>

            <v-col class="text-right">
                <svg class='mt-3 mr-4'  width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.6888 12.1666L10.803 9.28088C11.4985 8.27695 11.8464 7.15777 11.8464 5.92392C11.8464 5.12185 11.6906 4.35476 11.3792 3.62282C11.068 2.89076 10.6473 2.25979 10.1172 1.72974C9.58718 1.19969 8.95629 0.778965 8.22439 0.467719C7.49224 0.156385 6.72521 0.000732422 5.92313 0.000732422C5.12112 0.000732422 4.35403 0.156385 3.62209 0.467719C2.89003 0.778965 2.25905 1.19969 1.729 1.72974C1.1989 2.25979 0.778233 2.89088 0.466957 3.62282C0.155652 4.35485 0 5.12185 0 5.92392C0 6.72594 0.155652 7.49277 0.466957 8.22491C0.778203 8.95685 1.1989 9.58774 1.729 10.1178C2.25905 10.648 2.89015 11.0686 3.62209 11.38C4.35411 11.6913 5.12112 11.8469 5.92313 11.8469C7.15724 11.8469 8.27625 11.4989 9.28024 10.8036L12.1661 13.6809C12.368 13.894 12.62 14.0006 12.9232 14.0006C13.2148 14.0006 13.4674 13.894 13.6804 13.6809C13.8934 13.4678 14 13.2154 14 12.9237C14.0001 12.6266 13.8964 12.3741 13.6888 12.1666ZM8.58602 8.58652C7.84846 9.3242 6.96089 9.69303 5.92313 9.69303C4.88555 9.69303 3.99799 9.32411 3.26036 8.58652C2.52274 7.84895 2.15394 6.96151 2.15394 5.92375C2.15394 4.88616 2.52283 3.99845 3.26036 3.26098C3.99784 2.52332 4.88555 2.15455 5.92313 2.15455C6.96078 2.15455 7.84834 2.52347 8.58602 3.26098C9.32371 3.99845 9.6925 4.88616 9.6925 5.92375C9.6925 6.96151 9.32359 7.84895 8.58602 8.58652Z" fill="black"/>
                </svg>

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
        },
        computed: {

            currentTrainName() {
                return window.localStorage['currentTrainName'];
            }
        },
    }
</script >

<style scoped >

    .com {
        background: #FFF;
    }

</style >
