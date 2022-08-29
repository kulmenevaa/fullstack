import Vue from 'vue'
import Vuex from 'vuex'
import * as auth from './services/auth'
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        isLoggedIn: null,
        apiURL: 'http://fullstack/api/v1',
        serverPath: 'http://fullstack',
        profile: false
    },
    mutations: {
        authenticate(state, payload) {
            state.isLoggedIn = auth.isLoggedIn();
            if (state.isLoggedIn) {
                state.profile = payload;
                if(state.profile.avatar === null) {
                    state.profile.avatar = '/public/img/system/no_ava.png'
                }
            } else {
                state.profile = false;
            }
        }
    },
    actions: {
        authenticate(context, payload) {
            context.commit('authenticate', payload);
        }
    }
})
