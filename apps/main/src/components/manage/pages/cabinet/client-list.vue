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
            pageTitle: 'Клиенты',

            headers: [
                {text: 'ID', value: 'id'},
                {text: 'Наименование', value: 'name'},
                {text: 'Действия', value: 'action', sortable: false},
            ],
            data: [
                {
                    id: 1,
                    name: 'Иванов Иван'
                },
                {
                    id: 2,
                    name: 'Петров Петр'
                },
            ]
        }),

        methods: {
            editItem(item) {
                this.$router.push({path: `/manage/cabinet/client/${item.id}/view`}).catch(err => {
                })
            },

            deleteItem() {

            },
        }
    };
</script>
