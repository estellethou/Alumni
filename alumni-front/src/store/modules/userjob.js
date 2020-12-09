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
        commit("fecthUserDetails", response.data)
    },
}

    const mutations = {
        fetechUserDetails:(state, userDetails) => (state.userdetailsjob = userDetails),
    }

    
    export default{
        state,
        mutations,
        getters,
        actions
    }