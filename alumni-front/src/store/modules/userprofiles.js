import axios from "axios"

const state = {
    userprofiles:[]
}

const getters = {
    getAllUserProfiles:(state) => state.userprofiles,
};

const actions = {
    async setAllUserProfiles({commit}){
        var response = await axios.get("/userprofiles")
        commit("setMyAllUserProfiles", response.data)
    },
}

    const mutations = {
        setMyAllUserProfiles:(state, userprofiles) => (state.userprofiles = userprofiles),
    }

    
    export default{
        state,
        mutations,
        getters,
        actions
    }