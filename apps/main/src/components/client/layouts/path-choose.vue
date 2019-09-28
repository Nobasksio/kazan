<template >

    <div>
    <header-app></header-app>
        <div class="text-center fsb">Выбери станцию</div>
        <v-row class="justify-space-around text-our-grey pt-5">
            <v-col class="text-right mr-8 ">Станция</v-col>
            <v-col class="text-right mr-5">Время прибытия</v-col>
        </v-row>
        <v-timeline dense clipped class="pr-5">

            <v-timeline-item
                    class="mb-2 "
                    color="grey"
                    :icon-color="item.choosen +' lighten-2'"

                    small
                    :key="item.id"
                    v-for="item in station"
                    @click.native="make_choose(item.id)"
            >
                <v-row justify="space-between">
                    <v-col cols="6"><div class="float-left">{{ item.name }}</div><div class="rest_numb">15</div></v-col>
                    <v-col class="text-right" cols="5">{{ item.time }}</v-col>
                </v-row>
            </v-timeline-item>


        </v-timeline>
    </div>
</template >

<script >
    import headerApp from '../common/header-app';
    export default {
        components:{
            headerApp
        },
        data: function () {

        return{
            station:[
                {
                    name:'Иркутск',
                    time:'22:00',
                    active:false,
                    choosen:false,
                    id:1
                },
                {
                    name:'Красноярск',
                    time:'22:00',
                    active:true,
                    choosen:false,
                    id:2
                },
                {
                    name:'Новосибирск',
                    time:'22:00',
                    active:true,
                    choosen:false,
                    id:3
                },
            ]
        }
        },
        methods:{
            make_choose(id_station){


                this.$router.push('/client/catalog/list')
                this.station.forEach((item,i,arr)=>{
                    if (item.id != id_station){
                        item.choosen = false
                    } else {
                        item.choosen = true
                    }
                })
            }
        },
        name: "path-choose"
    }
</script >

<style scoped >
    .rest_numb{

        font-size: 10px;
        color: #BDBDBD;
        margin-top: -2px;
        margin-left: 2px;
    }
    .text-our-grey{
        color:#C4C4C4;
        font-size: 12px ;
    }
</style >
