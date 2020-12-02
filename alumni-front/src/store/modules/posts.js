import axios from "axios"


const state = {
    posts:[]
}

const getters = {
    getAllPosts:(state) => state.posts
}

const actions = {
    async allPosts({commit}){
        const response = await axios.get("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/posts")

        commit("setPosts",response.data)
    }
}

const mutations = {
    setPosts:(state,posts) => (state.posts = posts)
}

export default{
    state,
    getters,
    actions,
    mutations
}

