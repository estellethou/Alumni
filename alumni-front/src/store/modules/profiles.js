import axios from "axios"

const state = {
    profiles:[]
}

const getters = {
    getAllProfiles:(state) => state.profiles,
    getOneProfile:(state) => id => {
        for (var index in state.profiles){
            if (state.profiles[index].id == id){
                return state.profiles[index]
            }
        }
    }
};

const actions = {
    async setAllProfiles({commit}){
        var response = await axios.get("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/profiles")
        commit("setMyAllProfiles", response.data)
    },

    async addProfile({commit}, id_user){
        var response = await axios.post("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/profile", id_user)
        response = await axios.get(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/profile/${response.data.id}`)
        commit("addMyProfile", response.data)
    },

    async deleteProfile({commit}, id_profile){
        await axios.delete(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/profile/${id_profile}`)
        commit("deleteMyProfile", id_profile)
    },

    async updateProfile({commit}, newProfile){
        var response = await axios.put(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/profile/${newProfile.id}/edit`, newProfile)
        commit("updateMyProfile", response.data)
    },
}

const mutations = {
    setMyAllProfiles:(state, profiles) => (state.profiles = profiles),
    addMyProfile:(state, id_user) => (state.profiles.push(id_user)),
    deleteMyProfile:(state, id_profile) => (state.profiles = state.profiles.filter(profiles => profiles.id !== id_profile)),
    updateMyProfile:() => {return true} 
};

export default{
    state,
    mutations,
    getters,
    actions
}