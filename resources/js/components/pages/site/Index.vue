<template>
    <div id="site">
        <Header/>
        <main>
            <router-view/>
        </main>
        <!--<Footer/>-->
    </div>
</template>

<script>
    import Header from './layouts/Header'
    import Footer from './layouts/Footer'
    export default {
        components: {
            Header,
            Footer
        },
    }
</script>

