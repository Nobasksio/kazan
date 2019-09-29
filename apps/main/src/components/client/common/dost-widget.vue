<template >
    <div class="footer" >
        <v-row class="justify-space-around" >
            <v-col class="text-center" >
                <img src="../../../assets/gerb1.png" class="gerb py-3r" @click.native="go_to_local(1)" >
            </v-col >

            <v-col class="text-center" >
                <img src="../../../assets/gerb2.png" class="gerb" @click.native="go_to_local(2)" >
            </v-col >
            <v-col class="text-center" >
                <img src="../../../assets/gerb1_active.png" class="gerb" @click="go_to_local('1')" >
            </v-col >
            <v-col class="text-center"  >
                <div @click="go_to_local('1')">
                    <img src="../../../assets/gerb2.png" class="gerb" >
                </div >
            </v-col >
        </v-row >
    </div >
</template >

<script >
    export default {
        name: "dost-widget",
        methods: {
            go_to_local(id) {
                console.log('11')
                this.$router.push('/client/catalog/local/' + id)
            }
        }
    }
</script >

<style scoped >
    .footer {
        position: fixed;
        background: #ffffff;
        height: 60px;
        width: 100%;
        bottom: 0;
    }

    .gerb {
        max-width: 30px;

    }
</style >