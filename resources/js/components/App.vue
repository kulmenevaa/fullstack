<template>
    <div>
        <Preloader/>
        <router-view></router-view>
    </div>
</template>
<script>
    import * as auth from '../services/auth'
    import Preloader from './pages/Preloader'
    export default {
        name: 'App',
        components: {
            Preloader
        },
        beforeCreate() {
            if (auth.isLoggedIn()) {
                auth.getProfile().then(response => {
                    this.$store.dispatch('authenticate', response.data)
                }).catch(errors => {
                    auth.logout();
                })
            }
        },
    }
</script>

<style scope>
/* Settings */
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap');

:root {
    --bg-primary: #0033A0;
    --bg-border: #ced4da;
}
::selection {
    background: rgba(47, 85, 212, 0.9);
    color: #ffffff;
}  
a {
    transition: all 0.5s ease;
    text-decoration: none !important;
}
p {
    margin: 0 !important;
}
ol, ul {
    padding-left: 0 !important;
}
main {
    min-height: 450rem;
    background-color: #f8f9fc;
}
.row > * {
    position: relative;
}

/* Buttons */
.btn {
    border: none !important
}
.btn-primary {
    background-color: var(--bg-primary) !important;
    border: 1px solid var(--bg-primary) !important;
    color: #ffffff !important;
    box-shadow: 0 3px 5px 0 rgba(47, 85, 212, 0.1);
}
.btn-outline-primary {
    background-color: #fff !important;
    border: 1px solid var(--bg-border) !important;
    color: var(--bg-primary) !important;
    box-shadow: 0 3px 5px 0 rgba(47, 85, 212, 0.1);
}
.btn-outline-primary:hover,
.btn-outline-primary:focus,
.btn-outline-primary:active,
.btn-outline-primary.active
.btn-outline-primary.focus {
    background-color: var(--bg-primary) !important;
    border-color: var(--bg-primary) !important;
    color: #ffffff !important;
}

.btn-primary:hover, 
.btn-primary:focus, 
.btn-primary:active, 
.btn-primary.active, 
.btn-primary.focus {
    background-color: #2443ac !important;
    border-color: #2443ac !important;
    color: #ffffff !important;
}
.btn.btn-icon {
    height: 42px;
    width: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    border-radius: 50%;
    border: 1px solid var(--bg-border) !important;
}
.btn.btn-icon.full {
    width: 100% !important;
    border-radius: 0 !important;
}
.btn.btn-icon i {
    padding: 7;
}
.btn.btn-icon i,
.right-section .bell button i {
    font-size: 24px;
    border-radius: 8px;
}

/* Dropdown */
.dropdown {
    line-height: normal;
}
.dropdown .dropdown-toggle:after {
  display: none;
}
.dropdown-divider {
    border-top: 1px solid var(--bg-border) !important;
    margin: 0 !important
}
.dropdown-item.active {
    background-color: transparent !important;
    color: #cf4520 !important;
}

/* Modal */
.modal-content {
    border: 0 !important;
}
.modal-header .btn-close:hover,
.modal-header .btn-close:focus {
    background-color: transparent !important;
}
.modal-backdrop {
    background: rgba(0,0,0,.6) !important;
}

/* Form */
.form-check-input.form-check-input:checked {
    background-color: var(--bg-primary);
    border-color: var(--bg-primary);
}

/* All styles */
.logo img {
    height: 60px;
}
.avatar {
    margin-bottom: 5px;
}
.avatar img {
    height: 100%;
    width: 100%;
    border-radius: 50%;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}
.left-section {
    display: flex;
    align-items: center;
    float:left;
}
.right-section {
    float: right;
    margin-bottom: 0;
}
.right-section .header-icon {
    display: inline-block;
    margin-left: 1rem;
    margin-bottom: 0;
}
.right-section .menu {
    padding: 0 !important;
    margin-top: 0.5rem !important;
    border: 1px solid var(--bg-border) !important;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    inset: 0px 0px auto auto !important;
    transform: translate(0px, 38px) !important;
}
.right-section .auth .menu-item {
    font-size: 18px;
    padding: 0.8rem 1rem;
}
.right-section .menu-item:focus {
    background: var(--bg-border) !important;
    color: #3c4858 !important
}
.right-section .bell {
    position: relative;
}
.right-section .bell button {
    padding: 0;
}
.right-section .bell .menu-item {
    padding: 1rem 0.8rem !important;
}
.right-section .auth .menu {
    min-width: 200px;
}
.right-section .bell .menu {
    min-width: 300px;
}
.right-section .bell .menu-item-content {
    display: flex;
    align-items: center;
}
.right-section .bell .menu-item-content img {
    height: 45px;
    width: 45px;
    border-radius: 50%;
    margin-right: 0.5rem;
    border: 1px solid var(--bg-border);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); 
}
.right-section .bell .menu-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--bg-border);
    padding: 0.5rem 1rem;
}
.right-section .bell .menu-item-details h6 {
    color: #3c4858;
    font-size: 0.9rem;
    margin-bottom: 0;
}
.right-section .bell .menu-item-details small {
    font-size: 0.8rem;
    color: #6c757d;
}
.right-section .bell .menu-header h6 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 0;
    color: #3c4858;
}
.right-section .bell .menu-header .badge {
    border: 1px solid var(--bg-primary);
    color: var(--bg-primary)
}
.right-section .bell .active {
    position: absolute;
    background-color: red;
    border-radius: 50%;
    padding: .25rem;
    left: 100%;
    top: 0;
    transform: translate(-50%, -50%);
}

.page-content {
    display: inline-block;
    width: 100%;
    padding-left: 0px;
    /*overflow-x: hidden;*/
    transition: all 0.3s ease;
}
.page-content header {
    transition: all 0.3s ease;
}
.page-content header.sticky {
    position: fixed;
    right: 0;
    top: 0;
    z-index: 999;
    left: 0px;
    transition: all 0.3s ease;
}
.page-content header .header {
    height: 80px;
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
@media (max-width: 992px) {
    .page-content header .header {
        padding: 20px !important;
    }
}
.border-bottom {
    border-bottom: 1px solid var(--bg-border) !important;
}
.form-floating {
    margin-bottom: 1rem;
}
.form-floating:last-child {
    margin-bottom: 0;
}
.btn.btn-link {
    padding: 0 !important
}
.btn.btn-link:hover,
.btn.btn-link:focus {
    background-color: transparent !important;
    box-shadow: none !important;
}
#modal-login .modal-header,
#modal-recovery .modal-header {
    border-bottom: 0 !important;
}
#modal-login .modal-dialog,
#modal-recovery .modal-dialog {
    padding: 0 2rem;
}
#modal-login form,
#modal-recovery form {
    margin-top: 1.5rem;
    padding: 0 1rem;
}
#modal-login .brand,
#modal-recovery .brand {
    text-align: center;
}
#modal-login .option,
#modal-recovery .option {
    margin: 1rem 0 !important;
    font-weight: 600;
    font-size: 17px;
    text-align: center;
}
#modal-login .modal-footer,
#modal-recovery .modal-footer {
    justify-content: center !important;
}
</style>