import axios from "axios"

const state = {
    users:[],
    oneUser:[],
}

const getters = {
    getAllUsers:(state) => state.users,
    
    //return one user
    getOneUser:(state) => state.oneUser,
}

const actions = {
    async setAllUsers({commit}){
        var response = await axios.get("/users")
        commit("setMyAllUsers", response.data)
    },

    async setUser({commit}, userId){
        var response = await axios.get(`/user/${userId}`)
        commit("setMyUser", response.data)
    },

    //async addUser({commit}, newUser){
    //    var response = await axios.post("/auth/register", newUser)
    //    response = await axios.get(`/auth/user`)
    //    commit("addMyUser", response.data)
    //},

    async deleteUser({commit}, id){
        await axios.delete(`/user/${id}`)
        commit("deleteMyUser", id)
    },

    async updateUser({commit}, newUser){
        var response = await axios.put(`/user/${newUser.id}/edit`, newUser)
        commit("updateMyUser", response.data)
    },
}

const mutations = {
    setMyUser:(state, oneUser) => (state.oneUser = oneUser),
    setMyAllUsers:(state, users) => (state.users = users),
    addMyUser:(state, newUser) => (state.users.push(newUser)),
    deleteMyUser:(state, id) => (state.users = state.users.filter(users => users.id !== id)),
    updateMyUser:() => {return true} 
};

export default{
    state,
    mutations,
    getters,
    actions
}