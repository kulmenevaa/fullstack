<template>
    <footer>    
        <router-link :to="{name:'home'}">
            <img :src="image">
        </router-link>
        <Sidebar></Sidebar>
    </footer>
</template>

<script>
    import Sidebar from '../layouts/Sidebar'
    export default {
    data() {
        return {
            image: "/public/img/system/logo1.png",
        };
    },
    components: { Sidebar }
}
</script>

<style>

</style>