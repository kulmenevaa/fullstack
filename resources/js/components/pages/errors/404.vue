<template>
    <section class="errors">
        <img src="/public/img/system/404.png">
            <h5>Страница не найдена!</h5>
            <h6>Возможно, была удалена или переименована</h6>
    </section>
</template>
<script>
    export default {
        name: 'Error404',
        metaInfo: {
            title: 'Ошибка 404',
            meta: [
                { name:'keywords', content: '' },
                { name:'description', content: '' },
            ]
        },
    }
</script>

<style>
.errors {
    position: absolute;
    left: 50%;
    top: 50%;
    max-width: 600px;
    width: 100%;
    padding: 0px 80px;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}
.errors img {
    height: 300px;
    margin-bottom: 40px;
}
.errors h5 {
    font-size: 30px;
    color: #cf4520
}
.errors h6 {
    font-size: 18px;
}
</style>