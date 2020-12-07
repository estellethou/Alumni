import axios from "axios"

const state ={
    comments:[]
}

const getters ={
    getAllComments:(state) => state.comments
}

const actions ={

    async allComments({commit}){
        const response = await axios.get("/comments")
        commit("SET_COMMENTS",response.data)

    },

    async deleteComment({commit},id){
        await axios.delete(`/comment/${id}`)
        commit("REMOVE_COMMENT",id)
    },

    async addComment({commit},newComment){
        const response = await axios.post("/comments/post",newComment)
        commit("ADD_COMMENT",response.data)
    },

    async editComment({commit},updateComment){
        let response = await axios.put(`/comment/${updateComment.id}/edit`,updateComment)
        commit("UPDATE_POST", response.data)
    }
}

const mutations={

    SET_COMMENTS:(state,comments) => (state.comments = comments),
    REMOVE_COMMENT:(state,id) => state.comments =state.comments.filter((comment) => comment.id != id),
    ADD_COMMENT:(state,newComment) => state.comments.push(newComment),
    UPDATE_POST:(state,updateComment) => {
        const index = state.comments.findIndex(comment => comment.id === updateComment.id)
        if(index !== -1){
            state.comments.splice(index,1,updateComment)
        }
    }
};

export default{
    state,
    mutations,
    getters,
    actions
}