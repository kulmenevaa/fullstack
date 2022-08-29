<template>
    <footer>
		<p>{{ localTime }}</p>
	</footer>
</template>

<script>
    export default {
        data() {
            return {
                localTime: ''
            }
        },
        mounted() {
            this.getLocaleTime()
        },
        methods: {
            getLocaleTime() {
                setInterval(() => {
                    this.localTime = new Date().toLocaleTimeString()
                }, 1000)
            }
        }
    }
</script>
