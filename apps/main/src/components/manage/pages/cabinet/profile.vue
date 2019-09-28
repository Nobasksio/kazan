<template>
    <div>

        <PageTitle :title="pageTitle"></PageTitle>

    </div>

</template>

<script>

    import PageTitle from './../../common/page-title'

    export default {
        components: {
            PageTitle
        },
        data: () => ({
            pageTitle: 'Ваш профиль',

        }),
    };
</script>
