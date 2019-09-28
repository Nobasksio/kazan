<template>
    <div>

        <PageTitle :title="pageTitle"></PageTitle>

        <v-col sm="6">

            <v-card class="mb-5">
                <v-card-title><h4>Условия</h4></v-card-title>
                <v-divider></v-divider>

                <v-card-text>

                    <v-form
                            lazy-validation
                            ref="form"
                    >
                        <v-menu
                                ref="menu"
                                v-model="dateFromMenu"
                                :close-on-content-click="false"
                                transition="scale-transition"
                                offset-y
                                min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                                <v-text-field
                                        v-model="conditions.dateFrom"
                                        label="Дата с"
                                        readonly
                                        v-on="on"
                                ></v-text-field>
                            </template>
                            <v-date-picker v-model="conditions.dateFrom" no-title scrollable @change="dateFromMenu = false">
                                <div class="flex-grow-1"></div>
                            </v-date-picker>
                        </v-menu>

                        <v-menu
                                ref="menu"
                                v-model="dateToMenu"
                                :close-on-content-click="false"
                                transition="scale-transition"
                                offset-y
                                min-width="290px"
                        >
                            <template v-slot:activator="{ on }">
                                <v-text-field
                                        v-model="conditions.dateTo"
                                        label="Дата по"
                                        readonly
                                        v-on="on"
                                ></v-text-field>
                            </template>
                            <v-date-picker v-model="conditions.dateTo" no-title scrollable @change="dateToMenu = false">
                                <div class="flex-grow-1"></div>
                            </v-date-picker>
                        </v-menu>

                        <v-select
                                :items="[
                                    {text: 'Ресторан 1', value: 1},
                                    {text: 'Ресторан 2', value: 2},
                                ]"
                                label="Рестораны"
                                required
                                multiple
                                v-model="conditions.rests"
                        ></v-select>

                        <v-select
                                :items="[
                                    {text: 'Станция 1', value: 1},
                                    {text: 'Станция 2', value: 2},
                                ]"
                                label="Станции обслуживания"
                                required
                                multiple
                                v-model="conditions.stations"
                        ></v-select>

                        <v-btn
                                @click="onSubmit"
                                class="mr-4"
                                color="success"
                        >
                            Сформировать
                        </v-btn>


                    </v-form>

                </v-card-text>
            </v-card>

            <v-card class="mb-5">
                <v-card-title><h4>Результат</h4></v-card-title>
                <v-divider></v-divider>
                <v-list dense>
                    <v-list-item>
                        <v-list-item-content>Количество заказов:</v-list-item-content>
                        <v-list-item-content class="align-end">{{ report.orders }}</v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-content>Оборот заказов:</v-list-item-content>
                        <v-list-item-content class="align-end">{{ report.oborot }}</v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-content>Cумма комиссии:</v-list-item-content>
                        <v-list-item-content class="align-end">{{ report.komission }}</v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-content>Cумма к выплате:</v-list-item-content>
                        <v-list-item-content class="align-end">{{ report.topaid }}</v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-card>

        </v-col>

    </div>

</template>

<script>

    import PageTitle from './../../common/page-title'

    export default {
        components: {
            PageTitle
        },
        data: () => ({

            dateFromMenu: false,
            dateToMenu: false,

            pageTitle: 'Отчет по заказам',

            conditions: {
                stantions: [],
                rests: [],
                dateFrom: new Date().toISOString().substr(0, 10),
                dateTo: new Date().toISOString().substr(0, 10),
            },

            report: {
                orders: 30,
                oborot: 40000,
                komission: 4000,
                topaid: 2000
            }
        }),

        methods: {

            onSubmit() {

            },

            deleteItem() {

            },
        }
    };
</script>
