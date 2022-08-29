<template>
    <div>
        <b-modal id="modal-login" size="md" @show="reset" ok-only no-stacking centered>
            <template #modal-header="{ close }">
                <button type="button" class="btn btn-close" @click="close()"></button>
            </template>
            <template #default="{ hide }">
                <div class="brand">
                    <h4>Вход в систему</h4>  
                </div>
                <form @submit.prevent="login">
                    <div class="form-floating">
                        <input type="email" 
                            v-model="user.email" 
                            id="email" 
                            :class="{'form-control':true, 'is-invalid':errors.email}"
                            placeholder="Введите Email"
                        >
                        <label for="email">Введите Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" 
                            v-model="user.password" 
                            id="password" 
                            :class="{'form-control':true, 'is-invalid' : errors.password}"
                            placeholder="Введите Пароль"
                        >
                        <label for="password">Введите пароль</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" 
                                value="1" 
                                v-model="user.remember_me" 
                                id="remember_me" 
                                class="form-check-input"
                            >
                            <label class="form-check-label" for="remember_me">Запомнить меня</label>
                        </div>
                        <button type="button" v-b-modal.modal-recovery class="btn btn-link">Забыли пароль ?</button>
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary btn-lg">Войти</button>
                    </div>
                    <p class="option">Или через соцсети</p>
                    <div class="row justify-content-center">
                        <div class="col-6 text-center">
                            <button type="button" class="btn btn-icon btn-outline-primary full"> 
                                <i class="bx bxl-vk fs-5"></i>Вконтакте
                            </button>
                        </div>
                    </div>
                </form>
            </template>
            <template #modal-footer="{ ok, cancel, hide }">
                <small class="me-1">Нет аккаунта?</small> 
                <button class="btn btn-link" @click="register">Зарегистрироваться</button>
            </template>
        </b-modal>
        <RecoveryPassword/>
    </div>  
</template>

<script>
    import * as auth from '../../../services/auth'
    import RecoveryPassword from '../auth/RecoveryPassword'
    const formData = {email: '', password: '', remember_me: false}
    export default {  
        name: 'Login',
        metaInfo: {
            title: 'Вход',
            meta: [
                { name:'keywords', content: '' },
                { name:'description', content: '' },
            ]
        },
        components: {
            RecoveryPassword
        },
        data() {
            return {
                user: Object.assign({}, formData),
                errors: false,
            }
        },
        methods: {
            login() {
                auth.login(this.user).then(response => {
                    this.errors = false
                    this.$toast.success(response.message)
                    this.$bvModal.hide('modal-login')
                    this.user = Object.assign({}, formData)
                }).catch(errors => {
                    switch(errors.response.status) {
                        case 422:
                            this.errors = errors.response.data.errors
                            var list = '';
                            Object.values(this.errors).forEach(function(value) {
                                list += value[0] + "\r\n"
                            })
                            this.$toast.error(list)
                            break
                        default:
                            this.$toast.error(errors.response.data.message)
                    }
                })
            },
            register() {
                this.$bvModal.hide('modal-login')
                if(!(this.$route.name == 'register')) {
                   this.$router.push({name:'register'}) 
                }            
            },
            reset() {
                this.errors = false
            }
        },
    }
</script>
