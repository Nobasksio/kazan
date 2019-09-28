<template>
    <div>

        <PageTitle :title="pageTitle"></PageTitle>


        <v-form
                lazy-validation
                ref="form"
                v-model="valid"
        >
            <v-text-field
                    label="Наименование"
                    required
                    v-model="model.name"
            ></v-text-field>


            <v-btn
                    @click="onSubmit"
                    class="mr-4"
                    color="success"
            >
                Сохранить
            </v-btn>

            <v-btn
                    @click="onBack"
                    color="warning"
            >
                Назад
            </v-btn>

        </v-form>

    </div>

</template>

<script>

    import PageTitle from './../../common/page-title'

    export default {
        components: {
            PageTitle
        },
        data: () => ({
            valid: true,

            pageTitle: 'Юридическое лицо',

            model: {
                id: 1,
                name: 'ООО Рестоклуб',
                contract_id: 1,
                contract_name: '№234 от 09.09.2019'
            }
        }),

        methods: {

            onSubmit() {


            },

            onBack() {

            },
        }
    };
</script>
