export default {


state:{
    isLoggedIn:false,
    access_code:'',
    api_response:false
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
    setApiResponse({commit},paylod){
        commit('apiResponse',payload)
    }

}

}