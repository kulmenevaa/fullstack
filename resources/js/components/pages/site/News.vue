<template>
    <section class="news">
        <div class="section container">
            <h2 class="section__title">Все новости<span>.</span></h2>
            <div class="news__container grid">
                <a href="" v-for="(value, key) in news">
                    <article class="news__card">
                        <span class="news__tag">{{ value.created_at }}</span>
                        <img :src="value.img" alt="" class="news__img">
                        <div class="news__data">
                            <h3 class="news__title">{{ value.title }}</h3>
                            <span class="news__description">{{ value.description }}</span>
                        </div>
                        <span class="news__more">Подробнее...</span>
                    </article>
                </a>
            </div>
            <p v-if="errors">Ошибка загрузки данных!</p>
            <infinite-loading @infinite="infiniteHandler"> <!-- spinner="bubbles" -->
                <span slot="no-more"></span>
                <span slot="no-results"></span>
            </infinite-loading>
        </div>
    </section>
</template>
<script>
    import * as news from '../../../services/news'
    import InfiniteLoading from 'vue-infinite-loading'
    export default {
        name: "News",
        metaInfo: {
            title: 'Новости',
            meta: [
                { name:'keywords', content: '' },
                { name:'description', content: '' },
            ]
        },
        components: {
            InfiniteLoading
        },
        data() {
            return {
                page: 1,
                news: [],
                errors: false
            }
        },
        methods: {
            infiniteHandler($state) {
                setTimeout(() => {
                    news.getAllNews(this.page).then(response => {
                        const arr = response.data.news
                        if(arr.length > 1) {
                            arr.forEach((value, index) => {
                                this.news.push(value)
                            })
                            $state.loaded()
                            this.page += 1
                        } else {
                            $state.complete()
                        }
                    }).catch(errors => {
                        console.log(errors)
                    })
                }, 300)
            }
        }
    }
</script>