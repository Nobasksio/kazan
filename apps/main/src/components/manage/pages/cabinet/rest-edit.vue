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


            <v-select
                    :items="[
                        {text: 'Станция 1', value: 1},
                        {text: 'Станция 2', value: 2},
                    ]"
                    label="Станции обслуживания"
                    required
                    multiple
                    v-model="model.stations"
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
      pageTitle: 'Редактор ресторана',

      model: {
          name: 'Ресторан 1',
          stations: [1, 2]
      },

      headers: [
          { text: 'ID', value: 'id' },
          { text: 'Наименование', value: 'name' },
          { text: 'Actions', value: 'action', sortable: false },
      ],
      data: [
          {
              id: 1,
              name: 'Ресторан 1'
          },
          {
              id: 2,
              name: 'Ресторан 2'
          },
      ]
  }),

  methods: {
      editItem() {

      },

      deleteItem() {

      },
  }
};
</script>
