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
        var response = await axios.get("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/users")
        commit("setMyAllUsers", response.data)
    },

    async setUser({commit}, userId){
        var response = await axios.get(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/user/${userId}`)
        commit("setMyUser", response.data)
    },

    //async addUser({commit}, newUser){
    //    var response = await axios.post("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/auth/register", newUser)
    //    response = await axios.get(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/auth/user`)
    //    commit("addMyUser", response.data)
    //},

    async deleteUser({commit}, id){
        await axios.delete(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/user/${id}`)
        commit("deleteMyUser", id)
    },

    async updateUser({commit}, newUser){
        var response = await axios.put(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/user/${newUser.id}/edit`, newUser)
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