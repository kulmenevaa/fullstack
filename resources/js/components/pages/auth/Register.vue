<template>
    <div>
        <form @submit.prevent="register">
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input 
                    type="text" 
                    v-model="user.surname"
                    id="surname"
                    :class="{'form-control':true, 'is-invalid' : errors.surname}"
                />
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input 
                    type="text" 
                    v-model="user.name"
                    id="name"
                    :class="{'form-control':true, 'is-invalid' : errors.name}"
                />
            </div>
            <div class="mb-3">
                <label for="patronymic" class="form-label">Patronymic</label>
                <input 
                    type="text" 
                    v-model="user.patronymic"
                    id="patronymic"
                    :class="{'form-control':true, 'is-invalid' : errors.patronymic}"
                />
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input 
                    type="number" 
                    v-model="user.phone"
                    id="phone"
                    :class="{'form-control':true, 'is-invalid' : errors.phone}"
                />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    v-model="user.email"
                    id="email"
                    :class="{'form-control':true, 'is-invalid' : errors.email}"
                />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    v-model="user.password"
                    id="password"
                    :class="{'form-control':true, 'is-invalid' : errors.password}"
                />
            </div>
            <div class="mb-3">
                <label for="c_password" class="form-label">Password Confirmation</label>
                <input 
                    type="password" 
                    v-model="user.c_password"
                    id="c_password"
                    :class="{'form-control':true, 'is-invalid' : errors.c_password}"
                />
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input 
                    type="text" 
                    v-model="user.role"
                    id="role"
                    :class="{'form-control':true, 'is-invalid' : errors.role}"
                />
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</template>

<script>
    import * as auth from '../../../services/auth'
    const formData = {
        surname: '',
        name: '',
        patronymic: '',
        phone: '',
        email: '',
        password: '',
        c_password: '',
        role: ''
    }
    export default {  
        name: 'Register',
        metaInfo: {
            title: 'Регистрация',
            meta: [
                { name:'keywords', content: '' },
                { name:'description', content: '' },
            ]
        },
        data() {
            return {
                user: Object.assign({}, formData),
                errors: false
            }
        },
        methods: {
            register() {
                auth.register(this.user).then(response => {
                    this.errors = false;
                    this.$toast.success(response.data.message)
                    this.$router.push({name: 'home'})
                    this.$bvModal.show('modal-login')
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
        },
    }
</script>