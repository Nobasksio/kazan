<template>

    <div class="h-100">

    <v-row class="flex-column justify-space-around h-100">
        <v-col class="text-center align-self-center">
            <div class="pt-10">Спасибо! <br>
           
            Номер вашего заказа
            </div>
        </v-col>


        <v-col  class="text-center mt-n10">
            <div class="mt-n10 mb-10 red--text order_num">
                # 002
            </div>
            <img src="./../../../assets/man.png" alt=""  class="thank_man ">
        </v-col>
        <v-col class="text-center">
            <div>Следите за статусом заказа в</div>
            <div class="text-center py-5" >
                <v-btn rounded class="red darken-1 white--text my-bold px-10  min-widthb" @click="setshow3" >
                    В личном кабинете
                </v-btn >
            </div >
        </v-col>
    </v-row>

    </div>

</template>

<script>

import AppCommon from './../common/common'

export default {
  components: {
      AppCommon
  },
  data: () => ({
      drawer: true
  }),
};

</script>

<style scoped >
    .thank_man {
        width: 60%;
    }
    .h-100{
        height: 100%;
    }
    .order_num{
        font-size: 20px;
    }

    .gerb {
        max-width: 30px;

    }
</style >