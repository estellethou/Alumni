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
        console.log(response.data[0])

        commit("setAll",response.data)

    }
}

const mutations={

    setAll:(state,comments) => (state.comments = comments)

};

export default{
    state,
    mutations,
    getters,
    actions
}