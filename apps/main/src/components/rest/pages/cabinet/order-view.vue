<template>
    <div>

        <PageTitle :title="pageTitle"></PageTitle>

        <v-row
                class="mb-6"
        >
            <v-col sm="6">

                <v-card class="mb-5">
                    <v-card-title><h4>Доставка</h4></v-card-title>
                    <v-divider></v-divider>
                    <v-list dense>
                        <v-list-item>
                            <v-list-item-content>Станция:</v-list-item-content>
                            <v-list-item-content class="align-end">{{ model.stantion_name }}</v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>Время:</v-list-item-content>
                            <v-list-item-content class="align-end">{{ model.deliver_time }}</v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-card>

                <v-card>
                    <v-card-title><h4>Клиент</h4></v-card-title>
                    <v-divider></v-divider>
                    <v-list dense>
                        <v-list-item>
                            <v-list-item-content>Id:</v-list-item-content>
                            <v-list-item-content class="align-end">{{ model.id }}</v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>Имя клиента:</v-list-item-content>
                            <v-list-item-content class="align-end">{{ model.user_name }}</v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>Телефон:</v-list-item-content>
                            <v-list-item-content class="align-end">{{ model.user_phone }}</v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-card>

            </v-col>

            <v-col sm="6">

                <v-card>
                    <v-card-title><h4>Состав заказа</h4></v-card-title>
                    <v-divider></v-divider>

                    <div class="pa-5">

                        <v-row >

                            <v-col sm="4">
                                Код
                            </v-col>

                            <v-col sm="4">
                                Наименование
                            </v-col>

                            <v-col sm="4">
                                Количество
                            </v-col>

                        </v-row>

                        <v-row class="" v-for="item in model.basket">

                            <v-col sm="4">
                                {{item.id}}
                            </v-col>

                            <v-col sm="4">
                                {{item.name}}
                            </v-col>

                            <v-col sm="4">
                                {{item.quantity}}
                            </v-col>

                        </v-row>

                        <div class="">

                            <h3>Итого: {{model.price}}</h3>

                        </div>
                    </div>

                </v-card>

            </v-col>
        </v-row>


    </div>

</template>

<script>

    import PageTitle from './../../common/page-title'

    export default {
        components: {
            PageTitle
        },
        data: () => ({
            pageTitle: 'Заказ',

            model: {
                id: 1,
                created: '28.09.2019',
                deliver_time: '28.09.2019 14:00',
                user_name: 'Иванов Иван',
                user_phone: '79501102996',
                stantion_name: 'Станция 1',
                status_name: 'новый',
                price: 2400,
                basket: [

                    {
                        id: 1,
                        name: 'Солняка',
                        quantity: 3
                    },

                    {
                        id: 2,
                        name: 'Салат Цезарь',
                        quantity: 2
                    },
                ]
            }
        }),

        methods: {
            editItem(item) {
                this.$router.push({path: `/rest/cabinet/order/${item.id}/view`}).catch(err => {
                })
            },

            deleteItem() {

            },
        }
    };
</script>
