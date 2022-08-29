<template>
    <transition>
        <div class="preloader" v-if="show">
            <div class="spinner-border p-3"></div>
            <p>Добро пожаловать!</p>
        </div>
    </transition>
</template>

<script>
    export default {
        name: 'Preloader',
        data() {
            return {
                show: true
            }
        },
        mounted() {
            this.showPreloader()
        },
        methods: {
            showPreloader() {
                setTimeout(() => {
                    this.show = false
                }, 300)
            }
        }
    }
</script>

<style scoped>
    .preloader {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 99999;
    }
</style>