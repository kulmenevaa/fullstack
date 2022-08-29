<template>
    <div class="page-content">
        <header id="head" :class="{sticky:sticky}">
            <div class="header container">  
                <div class="left-section">
                    <router-link :to="{name:'home'}" class="logo">
                        <img :src="image" alt="">
                    </router-link>  
                    <div class="navbar-toggle">
                        <button type="button" class="btn btn-icon" @click="toggleMobile()">
                            <i class="bx bx-menu"></i>
                        </button>
                    </div>
                </div>
                <nav :class="{'d-block':showMenu}">
                    <Sidebar/>
                </nav>
                <ul class="right-section">
                    <li class="header-icon" v-if="$store.state.profile">
                        <div class="bell">
                            <button type="button" class="btn">
                                <i class="bx bx-bell"></i>
                            </button>
                            <span class="active"></span>
                        </div>
                    </li>
                    <li class="header-icon">
                        <div class="dropdown auth" v-if="$store.state.profile">
                            <button type="button" class="btn btn-icon avatar dropdown-toggle" data-bs-toggle="dropdown">
                                <img :src="$store.state.profile.avatar">
                            </button>
                            <div class="dropdown-menu menu avatar-menu">
                                <router-link :to="{name:'admin_home'}" class="menu-item dropdown-item" v-if="$store.state.profile.role.name === 'admin'">
                                    <span class="mb-0 d-inline-block me-1">
                                        <i class="bx bx-user"></i>
                                    </span>
                                    Управление
                                </router-link>
                                <div class="dropdown-divider"></div>
                                <router-link :to="{name:'profile'}" class="menu-item dropdown-item">
                                    <span class="mb-0 d-inline-block me-1">
                                        <i class="bx bx-user"></i>
                                    </span>
                                    Профиль
                                </router-link>
                                <div class="dropdown-divider"></div>
                                <router-link :to="{name:'settings'}" class="menu-item dropdown-item">
                                    <span class="mb-0 d-inline-block me-1">
                                        <i class="bx bx-cog"></i>
                                    </span>
                                    <span>Настройки</span>
                                </router-link>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="menu-item dropdown-item" @click="logout">
                                    <span class="mb-0 d-inline-block me-1">
                                        <i class="bx bx-exit"></i>
                                    </span>
                                    Выйти
                                </button>
                            </div>
                        </div>
                        <div v-else>
                            <b-button v-b-modal.modal-login class="btn btn-pills btn-primary login">Войти</b-button>
                            <b-button v-b-modal.modal-login class="btn btn-pills btn-primary login-mobile">
                                <i class="bx bx-user me-1"></i>
                            </b-button>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <Login/>
    </div>
</template>

<script>
    import * as auth from '../../../../services/auth'
    import Login from '../../auth/Login'
    import Sidebar from './Sidebar'
    export default {
        data() {
            return {
                image: '/public/img/system/logo1.png',
                showMenu: true,
                sticky: false
            }
        },
        components: {
            Login,
            Sidebar
        },
        mounted() {
            this.toggleMobile(),
            window.document.onscroll = () => {
                let navBar = document.getElementById('head')
                if(window.scrollY > navBar.offsetTop) {
                    this.sticky = true
                } else {
                    this.sticky = false
                }
            }
        },
        methods: {
            toggleMobile() {
                this.showMenu = !this.showMenu 
            },
            logout() {
                auth.logout()
            }
        }
    }
</script>

<style scoped>
#site .page-content header.sticky {
    background-color: #fff;
}
#site .page-content header.sticky .header {
    height: 80px;
}
#site .page-content header.sticky .navigation-menu {
    margin-top: 0.3rem;
    margin-bottom: 0.3rem;
}
#site header {
    border-bottom: 1px solid var(--bg-border);
}
#site .page-content header .header {
    background-color: transparent;
}
#site .login {
    display: flex;
    align-items: center;
    text-transform: uppercase; 
    font-weight: 600;
    font-size: 13.5px;
    padding: 10px 20px;
    display: block;
}
#site .login-mobile {
    height: 36px;
    width: 36px;
    align-items: center;
    padding: 0;
    border-radius: 50%;
    border: 1px solid var(--bg-border) !important;
    display: none;
}
#site .login-mobile i {
    font-size: 20px;
    padding: 7px;
    border-radius: 8px;
}
@media (max-width: 991px) {
    #site .login {
        display: none !important;
    }
    #site .login-mobile {
        display: inline-flex !important;
    }
}
#site .navbar-toggle {
    display: none;
}
#site .logo {
    float: left;
}
@media (min-width: 992px) {
    #site header nav {
        display: block !important;
    }
}

@media (max-width: 991px) {
    .navbar-toggle {
        display: block !important;
    }
    .logo {
        display: none !important;
    }
    #site header nav {
        max-height: 400px;
    }
    nav {
        position: absolute;
        top: 76px;
        left: 0;
        width: 100%;
        display: none;
        height: auto;
        padding-bottom: 0;
        overflow: auto;
        border-bottom: 1px solid var(--bg-border);
        background-color: #fff;
    }
}
</style>