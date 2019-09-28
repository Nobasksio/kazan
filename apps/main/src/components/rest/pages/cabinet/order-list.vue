<template>
    <div>

        <PageTitle :title="pageTitle"></PageTitle>

        <v-data-table
                :headers="headers"
                :items="data"
                :items-per-page="5"
                class="elevation-1"
        >
            <template v-slot:item.action="{ item }">

                <v-icon
                        @click="editItem(item)"
                        class="mr-2"
                        small
                >
                    mdi-square-edit-outline
                </v-icon>

                <v-icon
                        @click="deleteItem(item)"
                        small
                >
                    mdi-delete
                </v-icon>

            </template>

        </v-data-table>

    </div>

</template>

<script>

    import PageTitle from './../../common/page-title'

    export default {
        components: {
            PageTitle
        },
        data: () => ({

            pageTitle: 'Заказы',

            headers: [
                {text: 'ID', value: 'id'},
                {text: 'Клиент', value: 'user_name'},
                {text: 'Цена', value: 'price'},
                {text: 'Станция', value: 'stantion'},
                {text: 'Действия', value: 'action', sortable: false},
            ],
            data: [
                {
                    id: 1,
                    created: '28.09.2019',
                    user_name: 'Иванов Иван',
                    price: 2400,
                    basket: [

                    ]
                },
                {
                    id: 2,
                    created: '28.09.2019',
                    user_name: 'Петров петр',
                    price: 1000,
                    basket: [

                    ]
                }
            ]
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
