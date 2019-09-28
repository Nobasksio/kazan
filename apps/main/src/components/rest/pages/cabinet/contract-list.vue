<template>
    <div>

        <PageTitle :title="pageTitle"></PageTitle>

        <v-data-table
                :headers="headers"
                :items="data"
                :items-per-page="5"
                class="elevation-1"
        >
            <template v-slot:item.contract_name="{ item }">


                <div v-if="!item.contract_id">

                    <router-link :to="`/contract/create`">создать договор</router-link>

                </div>
                <div v-else>

                    <router-link :to="`/contract/${item.contract_id}/view`">{{item.contract_name}}</router-link>

                </div>

            </template>

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

            dateFromMenu: false,
            dateToMenu: false,

            pageTitle: 'Договоры',

            headers: [
                {text: 'ID', value: 'id'},
                {text: 'Наименование', value: 'name'},
                {text: 'Юр. лицо', value: 'legal_name'},
                {text: 'Дата создания', value: 'created_date'},
                {text: 'Дата подписания', value: 'confirm_date'},
                {text: 'Дата окончания', value: 'end_date'},
                {text: 'Действия', value: 'action', sortable: false},
            ],

            data: [
                {
                    id: 1,
                    name: 'О сотрудничестве',
                    legal_name: 'ООО Рестоклуб',
                    contract_id: 1,
                    contract_name: '№234 от 09.09.2019'
                },
                {
                    id: 2,
                    name: 'О сотрудничестве',
                    legal_name: 'ИП Иванов',
                    contract_id: 0,
                    contract_name: ''
                },
            ]
        }),

        methods: {

            editItem(item) {
                this.$router.push({path: `/rest/cabinet/legal/${item.id}/edit`}).catch(err => {})
            },

            deleteItem() {

            },
        }
    };
</script>
