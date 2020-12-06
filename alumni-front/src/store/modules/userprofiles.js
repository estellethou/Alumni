import axios from "axios"

const state = {
    userprofiles:[]
}

const getters = {
    getAllUserProfiles:(state) => state.userprofiles,
};

const actions = {
    async setAllUserProfiles({commit}){
        var response = await axios.get("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/userprofiles")
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