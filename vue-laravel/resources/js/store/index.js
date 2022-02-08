import {createStore} from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import module1 from './module1/index' 
import SecureLS from "secure-ls";
const ls = new SecureLS({ isCompression: false });





export default createStore({
    modules:{
        module1:module1
    },

    plugins: [
        createPersistedState({
            storage: window.sessionStorage
        })
      ]

})