<template>
    <ul class="navigation-menu">
        <li>
            <router-link :to="{name:'news'}">
                <span>Новости</span>
            </router-link>
        </li>
        <li>
            <router-link :to="{name:'events'}">
                <span>Мероприятия</span>
            </router-link>
        </li>
        <li>
            <router-link :to="{name:'news'}">
                <span>Есть вопрос?</span>
            </router-link>
        </li>
        <li>
            <router-link :to="{name:'news'}">
                <span>Контакты</span>
            </router-link>
        </li>
    </ul>
</template>

<style>
#site header .navigation-menu {
    margin: 1rem 0;
}
#site header .navigation-menu > li {
    float: left;
    display: block;
    position: relative;
    margin: 0 5px;
}
#site header .navigation-menu > li:hover > a {
    color: var(--bg-primary);
}
#site header .navigation-menu > li a.active {
    color: #cf4520;
}
#site header .navigation-menu > li > a {
    display: block;
    color: #3c4858;
    font-size: 16px;
    background-color: transparent !important;
    font-weight: 600;
    letter-spacing: 1px;
    line-height: 24px;
    text-transform: uppercase;
    padding-left: 15px;
    padding-right: 15px;
}
@media (min-width: 992px) {
    #site header .navigation-menu {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
}
@media (max-width: 991px) {
    #site header .navigation-menu > li {
        float: none;
    }  
    #site header .navigation-menu > li > a {
        color: #3c4858;
        padding: 10px 20px;
    }
    #site header .navigation-menu > li > a:hover {
        color: var(--bg-primary);
    }
}
</style>