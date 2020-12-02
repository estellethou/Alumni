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
        commit("SET_POSTS",response.data)
    },

    async deletePost({commit},id){
        await axios.delete(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/post/${id}`)
        commit("REMOVE_POST",id)
    }
}

const mutations = {
    SET_POSTS:(state,posts) => (state.posts = posts),
    REMOVE_POST:(state,id) => state.posts = state.posts.filter(post => post.id != id)
}

export default{
    state,
    getters,
    actions,
    mutations
}

