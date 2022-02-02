import {createStore} from 'vuex'
import createPersistedState from 'vuex-persistedstate'



export default createStore({
    state:{
        isLoggedIn:false,
        access_code:'',
    },
    mutations:{
        isUserLoggedIn(state,value){
        state.isLoggedIn = value
        },
        userLogout(state,value){
            state.isLoggedIn = value
        },
        userAccessCode(state,value){
            state.access_code = value
        }
    },
    actions:{
        setUserLoggedIn({ commit },payload){
            commit('isUserLoggedIn',payload)
        },
        logoutUser({commit}){
            commit('userLogout',false)
        },
        SetAccessCode({commit},payload){
            commit('userAccessCode',payload)
        },

    },

    plugins: [
        createPersistedState({
            storage: window.sessionStorage,
           
        })
      ]

})