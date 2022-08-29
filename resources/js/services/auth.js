import { http } from "./http"
import store from "../store"

export function register(user) {
    return http().post('/register', user)
}

export function login(user) {
    return http().post('/login', user).then(response => {
        if(response.status === 200) {
            localStorage.setItem('auth-token', JSON.stringify(response.data))
            store.dispatch('authenticate', response.data.user)
        }
        return response.data
    })
}

export function getProfile() {
    return http().get('/profile')
}

export function logout() {
    http().get('/logout')
    localStorage.removeItem('auth-token')
    store.dispatch('authenticate', false)
}

export function recoveryPassword(user) {
    return http().post('/recovery-password', user);
}

export function resetPassword(user) {
    return http().post('/reset-password', user);
}

export function isLoggedIn() {
    const token = localStorage.getItem('auth-token')
    return token != null;
}

export function getAccessToken() {
    const token = localStorage.getItem('auth-token')
    if(!token) {
        return null
    }
    const tokenData = JSON.parse(token)
    return tokenData.access_token
}

export function getUserRole() {
    const token = localStorage.getItem('auth-token')
    if(!token) {
        return null
    }
    const tokenData = JSON.parse(token)
    return tokenData.user.role.name
}

export function getUserAvatar() {
    const token = localStorage.getItem('auth-token')
    if(!token) {
        return null
    }
    const tokenData = JSON.parse(token)
    if(tokenData.user.avatar == null) {
        tokenData.user.avatar = '/public/img/system/no_ava.png'
    }
    return tokenData.user.avatar
}