<template>

    <div class="component basket-item mb-3">

        <v-container class="pa-0" grid-list-h-xs>

            <v-row dense>

                <v-col class="c-image pr-3" cols="3">

                    <img :src="`/images/product${item.product_id}.jpg`" >

                </v-col>

                <v-col class="c-info" cols="9">

                    <div class="c-name">
                        {{item.name}}
                    </div>

                    <v-container class="pa-0 mt-2">

                        <v-row no-gutters>

                            <v-col cols="7">

                                <div class="c-quantity d-flex align-center">

                                    <div @click="onQuantityMinus" class="c-quantity__minus">-</div>

                                    <div class="c-quantity__input">

                                      x  {{quantity}}

                                    </div>

                                    <div @click="onQuantityPlus" class="c-quantity__plus">+</div>

                                </div>

                            </v-col>

                            <v-col cols="5" class="text-right ">

                                <div class="c-price">
                                    {{price}} &#8381;
                                </div>

                            </v-col>

                        </v-row>

                    </v-container>


                </v-col>

            </v-row>

        </v-container>

    </div>


</template>
<script>

  export default {
    components: {},
    props: {
      item: { type: Object }
    },
    methods: {
      onQuantityPlus () {
        let quantity = parseInt(this.item.quantity) + 1
        this.$emit('itemQuantity', this.item, quantity)
      },
      onQuantityMinus () {
        if (parseInt(this.item.quantity) > 1) {

          let quantity = parseInt(this.item.quantity) - 1
          this.$emit('itemQuantity', this.item, quantity)

        } else {

          this.$emit('itemRemove', this.item)
        }
      },
      onQuantityChange (elm) {
        let quantity = parseInt(elm.target.value)
        this.$emit('itemQuantity', this.item, quantity)
      },
      onRemove () {
        this.$emit('itemRemove', this.item)
      }
    },
    computed: {

      price () {
        return Math.round(this.item.price)
      },
      quantity () {
        return Math.round(this.item.quantity)
      },

    },
    data () {
      return {}
    },
    watch: {},
    mounted: function () {

    }
  }
</script>

<style lang="scss" scoped>

    .component {
        padding: 0 0;
    }

    .c-image {
        line-height: 1;
        font-size: 0;
        img {
            max-width: 100%;
        }
    }

    .c-image {
        overflow: hidden;
    }

    .c-name {
        font-size: 18px;
        font-weight: 600;
        color: #111;
    }

    .c-desc {
        font-size: 15px;
        line-height: 1.35;
    }

    .c-gift {
        font-size: 14px;

        .c-gift__caption {
            color: #999;
        }

        .c-gift__item
        {
            display: flex;

            .c-gift__item__quantity {
                color: #111;
                font-weight: 500;
                margin-left: auto;
            }
        }
    }

    .c-weight {
        color: #888;
        font-size: 14px;
    }

    .c-quantity {

        .c-quantity__delete,
        .c-quantity__minus,
        .c-quantity__plus {
            width: 36px;
            height: 36px;
            text-align: center;
            color: #EE3124;
            line-height: 35px;
            cursor: pointer;
            vertical-align: middle;
            background: #FFF;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
            border-radius: 60px;
            font-weight: 600;
            font-size: 18px
        }

        .c-quantity__delete {

            border-color: #CCC;

            svg {
                fill: #CCC;
                width: 11px;
                height: 11px;
                vertical-align: middle;
            }

            &:hover {
                border-color: red;

                svg {
                    fill: red;
                }
            }
        }

        .c-quantity__input {
            text-align: center;
            padding: 0 14px 0 14px;
            white-space: nowrap;
            font-size: 16px;
            font-weight: 600;

            input {
                max-width: 100%;
                height: 100%;
                text-align: center;
                border: 0;
                outline: none;
            }
        }
    }

    .c-price {
        display: inline-block;
        color: #111;
        font-weight: 700;
        font-size: 21px;
    }


</style>
