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
    },

    async addPost({commit},newPost){
       const response = await axios.post("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/posts/post",newPost)
        commit("ADD_POST",response.data)
    },

    async editPost({commit},updatePost){
       let response = await axios.put(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/post/${updatePost.id}/edit`,updatePost)
       commit("UPDATE_POST",response.data)
    }
}

const mutations = {
    SET_POSTS:(state,posts) => (state.posts = posts),
    REMOVE_POST:(state,id) => state.posts = state.posts.filter(post => post.id != id),
    ADD_POST:(state,newPost) => state.posts.unshift(newPost),
    UPDATE_POST:(state,updatePost) =>{
        const index = state.posts.findIndex(post => post.id === updatePost.id)
        if(index !== -1){
            state.posts.splice(index,1,updatePost)
        }
    }

}

export default{
    state,
    getters,
    actions,
    mutations
}

