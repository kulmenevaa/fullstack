<template>
    <nav class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <router-link :to="{name:'admin_home'}" class="logo">
                    <img :src="image" alt="">
                </router-link>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <router-link :to="{name:'admin_home'}">
                        <i class="bx bx-home-alt"></i>
                        <span>Главная</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name:'admin_news'}">
                        <i class="bx bx-news"></i>
                        <span>Новости</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name:'admin_events'}">
                        <i class="bx bx-calendar-event"></i>
                        <span>Мероприятия</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name:'admin_faqs'}">
                        <i class="bx bx-message-rounded-dots"></i>
                        <span>Вопросы/Ответы</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name:'admin_users'}">
                        <i class="bx bx-user-circle"></i>
                        <span>Пользователи</span>
                    </router-link>
                </li>
                <li class="sidebar-dropdown" :class="{active:active}">
                    <a href="#" @click="toggleSub()">
                        <i class="bx bx-user-circle"></i>
                        <span>Меню</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="">123</a></li>
                            <li><a href="">123</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <ul class="sidebar-footer sidebar-menu">
            <li>
                <router-link :to="{name:'home'}">
                    <i class="bx bx-chevron-left-circle"></i>
                    <span>Вернуться на сайт</span>
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                active: true,
                image: '/public/img/system/logo1.png',
            }
        },
        mounted () { 
            this.toggleSub()
        },
        methods: {
            toggleSub() {
                this.active = !this.active 
            },
            logout() {
                auth.logout()
                this.$router.push({name: 'login'})
            }
        }
    }
</script>

<style scoped>
#admin.page-wrapper .sidebar-wrapper {
    border-right: 1px solid var(--bg-border);
    background-color: #fff;
    transition: all 0.3s ease;
}
#admin.page-wrapper .sidebar-wrapper .sidebar-brand > a,
#admin.page-wrapper .sidebar-wrapper .sidebar-menu li a {
    color: #3c4858;
    font-weight: 600;
}
#admin.page-wrapper .sidebar-wrapper .sidebar-menu li a:hover {
    color: var(--bg-primary)
}
#admin.page-wrapper .sidebar-wrapper .sidebar-menu li a.active,
#admin.page-wrapper .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a {
    color: #cf4520;
}
#admin .sidebar-wrapper {
    width: 260px;
    height: 100%;
    max-height: 100%;
    position: fixed;
    top: 0;
    left: -260px;
    z-index: 999;
}
@media (min-width: 1025px) {
    #admin .sidebar-wrapper {
        z-index: 1000;
    }
}
@media (max-width: 1024px) {
    #admin .sidebar-wrapper {
        left: -260px !important;
    }
    #admin.toggled .sidebar-wrapper {
        left: 0 !important;
    }
}
@media (max-width: 576px) {
    #admin.toggled .sidebar-wrapper {
        /*width: 100% !important;*/
        border: 1px solid var(--bg-border);
        border-left: 0;
    }
}
#admin .sidebar-wrapper ul {
    list-style-type: none;
    padding: 0;
    margin-top:30px;
}
#admin .sidebar-wrapper .sidebar-content {
    max-height: calc(100% - 30px);
    height: calc(100% - 60px);
    overflow-x: hidden;
    overflow-y: auto;
    position: relative;
}
#admin .sidebar-wrapper .sidebar-brand {
    padding: 15px 12px;
    display: flex;
    align-items: center;
}
#admin .sidebar-wrapper .sidebar-menu li a {
    width: 100%;
    position: relative;
    padding: 4px 20px 4px 4px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    margin-left: .5rem; 
    font-size: 18px;
}
#admin .sidebar-wrapper .sidebar-menu li a i {
    width: 33px;
    height: 33px;
    display: inline-flex !important;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    text-align: center;
    border-radius: 5px;
    transition: all 0.3s ease;
}
#admin.toggled .sidebar-wrapper {
    left: 0px;
}
#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
    content: "\203A" !important;
    color: #3c4858;
    position: absolute;
    font-size: 20px !important;
    right: 30px;
    top: 6px;
    transition: all 0.3s ease;
}
#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active .sidebar-submenu {
    display: block !important;
}
#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
    transform: rotate(90deg);
    color: #cf4520;
}
#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu {
    display: none;
}

#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
    padding: 5px 0;
}

#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul li {
    padding-left: 25px;
    font-size: 14px;
}

#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul li a:before {
    content: "\2013" !important;
    color: #3c4858;
    font-family: 'Material Design Icons';
    margin-right: 4px;
    font-size: 16px;
    transition: all 0.3s ease;
}
#admin .sidebar-footer {
    position: absolute;
    width: 100%;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 9px 0px !important;
    border-top: 1px solid var(--bg-border);
    height: 58px;
}
#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul li a .badge,
#admin .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul li a .label {
  float: right;
  margin-top: 0px;
}
</style>