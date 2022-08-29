<template>
    <div id="admin" class="page-wrapper" :class="{toggled: toggled}">
        <Sidebar/>
        <div class="page-content">
            <header id="head" :class="{sticky:sticky}">
                <div class="header container-fluid">
                    <div class="left-section">
                        <button class="btn btn-icon" @click="toggleNav()">
                            <i class="bx bx-menu"></i>
                        </button>
                    </div>
                    <ul class="right-section">
                        <li class="header-icon">
                            <div class="bell">
                                <button type="button" class="btn">
                                    <i class="bx bx-bell"></i>
                                </button>
                                <span class="active"></span>
                            </div>
                        </li>
                        <li class="header-icon">
                            <div class="dropdown auth">
                                <button type="button" class="btn btn-icon avatar dropdown-toggle" data-bs-toggle="dropdown">
                                    <img :src="this.$store.state.profile.avatar">
                                </button>
                                <div class="dropdown-menu menu">
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
                        </li>
                    </ul>
                </div>
            </header>
            <main class="container-fluid">
                <div class="container-wrapper">
                    <router-view/>
                </div>
            </main>
            <Footer/>
        </div>
    </div>
</template>

<script>
    import * as auth from '../../../services/auth' 
    import Sidebar from './layouts/Sidebar'
    import Footer from './layouts/Footer'
    export default {
        data() {
            return {
                image: '/public/img/system/logo1.png',
                toggled: false,
                sticky: false
            }
        },
        mounted () {
            if(localStorage.toggled) {
                this.toggled = JSON.parse(localStorage.toggled)
            }
            window.document.onscroll = () => {
                let navBar = document.getElementById('head')
                if(window.scrollY > navBar.offsetTop) {
                    this.sticky = true
                } else {
                    this.sticky = false
                }
            }
            this.toggleNav()
        },
        methods: {
			toggleNav () {
                this.toggled = !this.toggled 
                localStorage.toggled = JSON.stringify(!this.toggled)
			},
            logout() {
                auth.logout()
                this.$router.push({name: 'home'})
            }
		},
        components: {
            Sidebar,
            Footer
        }
    }
</script>

<style scope>
#admin .page-content header .header {
    height: 80px !important;
}
#admin .page-content header {
    border-bottom: 1px solid var(--bg-border);
}
#admin.toggled header {
    left: 260px;
}
@media (max-width: 1024px) {
    #admin.toggled header {
        left: 0 !important;
    } 
}
#admin.toggled .page-content {
    padding-left: 260px;
}
#admin .page-content header .header {
    background-color: #fff;
    padding: 0 30px;
}
#admin .page-content .container-wrapper {
    min-height: calc(100vh - 59px) !important;
    position: relative;
}
</style>