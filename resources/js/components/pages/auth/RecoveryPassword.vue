<template>
    <div>
        <b-modal id="modal-recovery" size="md" @show="reset" ok-only no-stacking centered>
            <template #modal-header="{ close }">
                <button type="button" class="btn btn-close" @click="close()"></button>
            </template>
            <template #default="{ hide }">
                <div class="brand">
                    <h4>Восстановление пароля</h4>  
                </div>
                <form @submit.prevent="recovery">
                    <div class="text-center mb-4">
                        <p>Введите адрес электронной почты.</p>
                        <p>Мы вышлем на него инструкции по сбросу пароля.</p>
                    </div>
                    <div class="form-floating">
                        <input type="email" 
                            v-model="user.email" 
                            id="email" 
                            :class="{'form-control':true, 'is-invalid':errors.email }"
                            placeholder="Введите Email"
                        >
                        <label for="email">Введите Email</label>
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary btn-lg" ref="btnSubmit">Восстановить</button>
                    </div>
                </form>
            </template>
            <template #modal-footer="{ ok, cancel, hide }">
                <small class="me-1">Вспомнили пароль?</small> 
                <button type="button" v-b-modal.modal-login class="btn btn-link">Войти</button>
            </template>
        </b-modal> 
    </div>
</template>

<script>
    import * as auth from '../../../services/auth'
    export default {
        name: 'RecoveryPassword',
        metaInfo: {
            title: 'Восстановление',
            meta: [
                { name:'keywords', content: '' },
                { name:'description', content: '' },
            ]
        },
        data() {
            return {
                user: {
                    email: ''
                },
                btnOldHtml: '',
                errors: false
            }
        },
        methods: {
            recovery() {
                this.disableSubmission(this.$refs.btnSubmit)
                this.errors = false
                auth.recoveryPassword(this.user).then(response => {
                    this.$router.push({name: 'reset-password', params: { email: this.user.email }})
                    this.$bvModal.hide('modal-recovery')
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
                    this.enableSubmission(this.$refs.btnSubmit)
                })
            },
            disableSubmission(btn) {
                btn.setAttribute('disabled', 'disabled')
                this.btnOldHtml = btn.innerHTML
                btn.innerHTML = '<span class="spinner-grow spinner-grow-sm me-2" aria-hidden="true"></span>Загрузка...'
            },
            enableSubmission(btn) {
                btn.removeAttribute('disabled')
                btn.innerHTML = this.btnOldHtml
            },
            reset() {
                this.errors = false
            }
        }
    };
</script>

