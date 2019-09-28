<template>

    <div>

        <div class="c-timeline">

            <swiper :options="{
                          slidesPerView: 3,
                          paginationClickable: true,
                          grabCursor: true,
                          paginationClickable: true,
                          nextButton: '.next-slide',
                          prevButton: '.prev-slide',
                          centeredSlides: true,
                    }"
                    class="swiper-wrapper c-timeline"
            >

                <swiper-slide v-for="station in stations">

                    <div class="с-item-name">
                        {{station.name}}
                    </div>

                    <div class="с-item-time">
                        <span>{{station.time}}</span>
                    </div>

                </swiper-slide>

            </swiper>


        </div>

    </div>

</template>

<script>

    import {swiper, swiperSlide} from 'vue-awesome-swiper'

    export default {
        components: {
            swiper,
            swiperSlide
        },
        data: function () {

            return {
                stations: [
                    {
                        name: 'Иркутск',
                        time: '22:00',
                        active: false,
                        choosen: false,
                        id: 1
                    },
                    {
                        name: 'Красноярск',
                        time: '22:00',
                        active: true,
                        choosen: false,
                        id: 2
                    },
                    {
                        name: 'Новосибирск',
                        time: '22:00',
                        active: true,
                        choosen: false,
                        id: 3
                    },
                    {
                        name: 'Красноярск',
                        time: '22:00',
                        active: true,
                        choosen: false,
                        id: 4
                    },
                ]
            }
        },
        methods: {
            make_choose(id_station) {


            }
        },
        name: "path-choose"
    }
</script>

<style lang="scss" scoped>

    .c-timeline {
        background: #FFF;
        padding: 0 0 8px 0;
    }

    .с-item-name {
        margin-bottom: 20px;
        padding: 0px 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 14px;
        line-height: 1;
        color: #BDBDBD;
    }

    .с-item-time {
        padding: 0px 40px;
        display: flex;
        justify-content: center;
        border-top: 1px solid #111;
        position: relative;
        transition: all 200ms ease-in;
        font-size: 14px;
        color: #BDBDBD;
        font-weight: 400;
        padding-top: 20px;

        span {

            &:before {
                content: '';
                width: 10px;
                height: 10px;
                background-color: #e8eeff;
                border-radius: 15px;
                border: 4px solid #EE3124;
                position: absolute;
                top: -10px;
                left: 44%;
                transition: all 200ms ease-in;
            }
        }
    }


    .swiper-control {
        text-align: right;
    }

    .swiper-container {
        width: 100%;
        overflow: hidden;
    }

    .swiper-slide {
        width: 200px;
        text-align: center;
        font-size: 18px;

        &.swiper-slide-active {

            .с-item-name {
                color: #EE3124;
                font-size1: 15px;
            }

            .с-item-time {
                color: #111;
                font-weight: 700;
                font-size: 16px;
            }
        }
    }

    .swiper-slide:nth-child(2n) {
        width: 40%;
    }

    .swiper-slide:nth-child(3n) {
        width: 20%;
    }

</style>
