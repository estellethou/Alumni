import axios from "axios"

const state = {
    userdetailsjob:[]
}

const getters = {
    getUserDetails:(state) => state.userdetailsjob,
};

const actions = {
    async setUserDetails({commit}){
        var response = await axios.get("/userdetailsjob")
        commit("fetchUserDetails", response.data)
    },
}

    const mutations = {
        fetchUserDetails:(state, userDetails) => (state.userdetailsjob = userDetails),
    }

    
    export default{
        state,
        mutations,
        getters,
        actions
    }