<template>

    <div>

        <AppHeaderCommon></AppHeaderCommon>

        <div class="text-center fsb">Выберите станцию</div>

        <template v-if="result.loaded">

            <v-row class="justify-space-around text-our-grey pt-5">
                <v-col class="text-right mr-8 ">Станция</v-col>
                <v-col class="text-right mr-5">Время прибытия</v-col>
            </v-row>

            <v-timeline class="pr-5" clipped dense>

                <v-timeline-item
                        :icon-color="item.choosen +' lighten-2'"
                        :key="item.id"
                        @click.native="make_choose(item)"

                        class="mb-2 "
                        color="grey"
                        small
                        v-for="item in result.routes"
                >
                    <v-row justify="space-between">
                        <v-col cols="6">
                            <div class="float-left">{{ item.station_name }}</div>
                            <div class="rest_numb">15</div>
                        </v-col>
                        <v-col class="text-right" cols="5">
                            {{ moment(parseInt(item.arrival_time) * 1000).format('HH:mm') }}
                        </v-col>
                    </v-row>
                </v-timeline-item>

            </v-timeline>

        </template>
        <template v-else>


            <div class="text-center mt-10">

                <v-progress-circular
                        color="primary"
                        indeterminate
                ></v-progress-circular>

            </div>

        </template>


    </div>
</template>

<script>
    import axios from 'axios'

    const moment = require('moment')

    export default {
        components: {},
        data: function () {

            return {
                result: {
                    routes: [],
                    loaded: false
                },
            }
        },

        computed: {

            currentTrainName() {
                return window.localStorage['currentTrainName'];
            }
        },

        mounted() {

            this.loadData();
        },

        methods: {

            moment: function (data) {
                return moment(data);
            },

            loadData() {

                axios.get(`/api/train/route`, {

                    params: { train_id: window.localStorage['currentTrainId'] }

                }).then(({data}) => {

                    this.result.routes = data.routes

                    this.result.loaded = true;

                })
            },

            make_choose(item) {

                window.localStorage['currentRouteId'] = item.id;
                window.localStorage['currentRouteStationName'] = item.station_name;

                this.$router.push('/client/catalog/list')
            }
        },
        name: "path-choose"
    }
</script>

<style scoped>
    .rest_numb {

        font-size: 10px;
        color: #BDBDBD;
        margin-top: -2px;
        margin-left: 2px;
    }

    .text-our-grey {
        color: #C4C4C4;
        font-size: 12px;
    }
</style>
