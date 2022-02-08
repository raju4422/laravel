export default {


state:{
    isLoggedIn:false,
    access_code:'',
    api_response:false,
    user_id:null
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
    },
    apiResponse(state,value){
        state.api_response = value
    },
    userId(state,value){
        state.user_id = value
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
    setApiResponse({commit},payload){
        commit('apiResponse',payload)
    },

    setuserId({commit},payload){
        commit('userId',payload)
    }

}

}