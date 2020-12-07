import axios from "axios"

const state = {
    profiles:[],
    oneProfile:[]
}

const getters = {
    getAllProfiles:(state) => state.profiles,
    
    //return one profile 
    getOneProfile:(state) => state.oneProfile,
};

const actions = {
    async setAllProfiles({commit}){
        var response = await axios.get("/profiles")
        commit("setMyAllProfiles", response.data)
    },

    async setProfile({commit}, profileId){ //id profile
        var response = await axios.get(`/profile/${profileId}`)
        //console.log(response.data);
        commit("setMyProfile", response.data)
    },


    //async addProfile({commit}, newProfile){
    //    var response = await axios.post("/profile", newProfile)
    //    response = await axios.get(`/profile/${response.data.id}`)
    //    commit("addMyProfile", response.data)
    //},

    async deleteProfile({commit}, id){ //id profile (not id user)
        await axios.delete(`/profile/${id}`)
        commit("deleteMyProfile", id)
    },

    async updateProfile({commit}, newProfile){
        let response = await axios.patch(`/profile/${newProfile.id}/edit`, newProfile)
        response = await axios.get(`/profiles`)
        commit("updateMyProfile", response.data)
    },
}

const mutations = {
    setMyProfile:(state, oneProfile) => (state.oneProfile = oneProfile),
    setMyAllProfiles:(state, profiles) => (state.profiles = profiles),
    addMyProfile:(state, newProfile) => (state.profiles.push(newProfile)),
    deleteMyProfile:(state, id) => (state.profiles = state.profiles.filter(profile => profile.id !== id)),
    updateMyProfile: (state, profiles) => (state.profiles = profiles), //response.data == profiles 
};

export default{
    state,
    mutations,
    getters,
    actions
}