import axios from "axios"


const state = {
    events:[]
}

const getters = {
    getAllEvents:(state) => state.events
}

const actions = {
    async setAllEvents({commit}){
        const response = await axios.get("/events")
        commit("SET_EVENTS",response.data)
    },

    async deleteEvent({commit},id){
        await axios.delete(`/event/${id}`)
        commit("REMOVE_EVENT", id)
    },

    async addEvent({commit},newEvent){
       const response = await axios.post("/events",newEvent)
        commit("ADD_EVENT",response.data)
    },

    async editEvent({commit},updateEvent){
       let response = await axios.put(`/event/${updateEvent.id}/edit`,updateEvent)
       commit("UPDATE_EVENT",response.data)
    }
}

const mutations = {
    SET_EVENTS:(state,events) => (state.events = events),
    REMOVE_EVENT:(state,id) => state.events = state.events.filter(event => event.id != id),
    ADD_EVENT:(state,newEvent) => state.events.unshift(newEvent),
    UPDATE_EVENT:(state,updateEvent) =>{
        const index = state.events.findIndex(event => event.id === updateEvent.id)
        if(index !== -1){
            state.events.splice(index,1,updateEvent)
        }
    }

}

export default{
    state,
    getters,
    actions,
    mutations
}
