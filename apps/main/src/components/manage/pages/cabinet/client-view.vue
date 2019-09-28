<template>
    <div>

        <PageTitle :title="pageTitle"></PageTitle>


        Иванов

    </div>

</template>

<script>

    import PageTitle from './../../common/page-title'

    export default {
        components: {
            PageTitle
        },
        data: () => ({
            pageTitle: 'Клиент',

            model: {
                name: 'Иванов Иван',
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
