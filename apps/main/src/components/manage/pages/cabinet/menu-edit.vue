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

            <v-text-field
                    label="Цена"
                    required
                    v-model="model.price"
            ></v-text-field>

            <v-select
                    :items="[
                        {text: 'Салаты', value: 1},
                        {text: 'Горячее', value: 2},
                        {text: 'Суши', value: 3},
                    ]"
                    label="Категория"
                    required
                    multiple
                    v-model="model.cats"
            ></v-select>


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
            pageTitle: 'Редактор позиции меню',

            valid: true,

            model: {
                price: 300,
                name: 'Солянка',
                cats: [1, 2]
            }
        }),

        methods: {
            editItem(item) {
                this.$router.push({path: `/rest/cabinet/rest/${item.id}/edit`}).catch(err => {
                })
            },

            deleteItem() {

            },
        }
    };
</script>
