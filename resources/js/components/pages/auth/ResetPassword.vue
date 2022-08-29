<template>
	<div class="container">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header">Reset Password</div>
			<div class="card-body">
				<div class="text-center mb-4">
					<h4>Reset your password</h4>
				</div>
				<form @submit.prevent="reset">
					<div class="form-group">
						<div class="form-label-group">
							<input
								type="email"
								id="inputEmail"
								placeholder="Enter email address"
                                v-model="user.email"
                                :class="{'form-control':true, 'is-invalid' : errors.email}"
							/>
						</div>
					</div>
                    <div class="form-group">
						<div class="form-label-group">
							<input
								type="number"
                                id="verificationCode"
								placeholder="Enter verifcation code"
                                v-model="user.verification_code"
                                :class="{'form-control':true, 'is-invalid' : errors.verification_code}"
							/> 
						</div>
					</div>
                    <div class="form-group">
						<div class="form-label-group">
							<input
								type="password"
								id="password"
								placeholder="Enter new password"
                                v-model="user.password"
                                :class="{'form-control':true, 'is-invalid' : errors.password}"
							/>
						</div>
					</div>
                    <div class="form-group">
						<div class="form-label-group">
							<input
								type="password"
								id="c_password"
								placeholder="Confirm password"
                                v-model="user.c_password"
                                :class="{'form-control':true, 'is-invalid' : errors.c_password}"
							/>
						</div>
					</div>
                    <button type="submit" class="btn btn-primary btn-block" ref="btnSubmit">Reset Password</button>
				</form>
				<div class="text-center">
					<router-link to="/reset-password-request" class="d-block small mt-3">Resend Verification Code</router-link>
					<!--<router-link class="d-block small" to="/login">Login Page</router-link>-->
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    import * as auth from '../../../services/auth';
    export default {
        name: 'ResetPassword',
        metaInfo: {
            title: 'Сброс пароля',
            meta: [
                { name:'keywords', content: '' },
                { name:'description', content: '' },
            ]
        },
        data() {
            return {
                user: {
                    email: '',
                    verification_code: '',
                    password: '',
                    c_password: '',
                },
                btnOldHtml: '',
                errors: false
            }
        },
        beforeRouteEnter(to, from, next) {
            next(vm => {
                vm.user.email = to.params.email
            });
        },
        methods: {
            reset() {
                this.disableSubmission(this.$refs.btnSubmit)
                this.errors = false
                auth.resetPassword(this.user).then(response => {
                    this.$router.push({name:'home'})
                    this.$bvModal.show('modal-login')
                    this.$toast.success(response.data.message)
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
                    this.enableSubmission(this.$refs.btnSubmit);
                })
            },
            disableSubmission(btn) {
                btn.setAttribute('disabled', 'disabled');
                this.btnOldHtml = btn.innerHTML;
                btn.innerHTML = '<span class="fa fa-spinner fa-spin"></span> Please wait...';
            },
            enableSubmission(btn) {
                btn.removeAttribute('disabled');
                btn.innerHTML = this.btnOldHtml;
            }
        }
    };
</script>