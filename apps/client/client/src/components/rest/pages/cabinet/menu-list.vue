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
            pageTitle: 'Меню',

            headers: [
                {text: 'ID', value: 'id'},
                {text: 'Наименование', value: 'name'},
                {text: 'Цена', value: 'price'},
                {text: 'Категория', value: 'cat'},
                {text: 'Ресторан', value: 'rest'},
                {text: 'Действия', value: 'action', sortable: false},
            ],
            data: [
                {
                    id: 1,
                    name: 'Ресторан 1',
                    price: 400,
                    cat: 'Салаты'
                },
                {
                    id: 2,
                    name: 'Ресторан 2',
                    price: 500,
                    cat: 'Горячее'
                },
                {
                    id: 2,
                    name: 'Ресторан 2',
                    price: 500,
                    cat: 'Роллы'
                },
            ]
        }),

        methods: {
            editItem(item) {
                this.$router.push({path: `/rest/cabinet/menu/${item.id}/edit`}).catch(err => {
                })
            },

            deleteItem() {

            },
        }
    };
</script>
