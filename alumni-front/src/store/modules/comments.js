import axios from "axios"

const state ={
    comments:[]
}

const getters ={
    getAllComments:(state) => state.comments
}

const actions ={

    async allComments({commit}){
        const response = await axios.get("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/comments")
        commit("SET_COMMENTS",response.data)

    },

    async deleteComment({commit},id){
        await axios.delete(`http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/comment/${id}`)
        commit("REMOVE_COMMENT",id)
    },

    async addComment({commit},newComment){
        const response = await axios.post("http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/comments/post",newComment)
        console.log(response)

        commit("ADD_COMMENT",newComment)
    }
}

const mutations={

    SET_COMMENTS:(state,comments) => (state.comments = comments),
    REMOVE_COMMENT:(state,id) => state.comments =state.comments.filter((comment) => comment.id != id),
    ADD_COMMENT:(state,newComment) => state.comments.push(newComment),

};

export default{
    state,
    mutations,
    getters,
    actions
}