<template>
    <div>

        <PageTitle :title="pageTitle"></PageTitle>

        <div>
            sss
        </div>

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

            model: {
                id: 1,
                created: '28.09.2019',
                user_name: 'Иванов Иван',
                price: 2400,
                basket: [

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
