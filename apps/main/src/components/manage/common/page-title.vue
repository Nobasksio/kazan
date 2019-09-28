<template>
    <div>

        <h1 class="c-title mb-6">{{title}}</h1>

    </div>

</template>

<script>
    export default {
        props: {
            title: {}
        },
        data: () => ({}),
    };
</script>

<style lang="scss">

    .c-title {
        margin: 0 0 10px 0;
    }

</style>
