<template>
    <section id="home">
        <div class="container">
            <VueSlickCarousel v-bind="settings">
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-container pe-3">
                    <div class="card item">
                        <img :src="'/public/img/events/590.png'">
                        <div class="overlay-item bg-dark"></div>
                        
                        <div class="icons text-center">
                            <a href="images/personal/1.jpg" class="carousel-icon">
                                <i class="bx bx-camera image-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </VueSlickCarousel>
        </div>
    </section>
</template>
<script>
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
    export default {
        name: "Home",
        metaInfo: {
            title: 'Главная',
            meta: [
                { name:'keywords', content: '' },
                { name:'description', content: '' },
            ]
        },
        data() {
            return {
                settings: {
                    "arrows": true,
                    "dots": false,
                    "focusOnSelect": false,
                    "infinite": true,
                    "speed": 500,
                    "slidesToShow": 5,
                    "slidesToScroll": 5,
                    "autoplay": true,
                }
            }
        },
        components: { VueSlickCarousel },
    }
</script>

<style>
    .slick-arrow, .slick-arrow:focus, .slick-arrow:active, .slick-arrow:hover {
        background-color: red;
    }
    .carousel-container .item img,
    .carousel-container .item .overlay-item,
    .carousel-container .item .icons,
    .carousel-container .item .icons .carousel-icon {
        transition: all 0.5s ease;
    }
    .carousel-container .item .overlay-item,
    .carousel-container .item .icons {
        position: absolute;
    }
    .carousel-container .item {
        border-radius: 0;
        padding: 0.3rem;
    }
    .carousel-container .item .overlay-item {
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        opacity: 0;
        z-index: 1;
    }
    .carousel-container .item .icons {
        right: 0;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
        opacity: 0;
    }
    .carousel-container .item .icons .carousel-icon {
        height: 45px;
        width: 45px;
        line-height: 45px;
        border-radius: 50%;
        display: inline-block;
        background-color: #fff;
        color: var(--bg-primary);
    }
    .carousel-container .item .icons .carousel-icon:hover {
        background: var(--bg-primary) !important;
        color: #ffffff !important;
    }
    .carousel-container .item:hover img {
        /*transform: scale(1.5);*/
    }
    .carousel-container .item:hover .overlay-item {
        opacity: 0.65;
    }
    .carousel-container .item:hover .icons {
        opacity: 1;
    }
</style>