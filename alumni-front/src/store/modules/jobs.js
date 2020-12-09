import axios from 'axios';

const state = { jobs: []};

const getters = {
    getAllJobs: (state) => state.jobs,
};

const actions = {
    async fetchAllJobs ({ commit }) {
        const response = await axios.get(
            '/jobs'
        );
        commit('setJobs', response.data);
    },

    async addJob ({ commit }, newJob) {
        const response = await axios.post(
            '/jobs/post',
            newJob
        );
        commit('addNewJob', response.data);
    },

    async deleteJob({ commit}, id) {
        await axios.delete(
            `/job/${id}`
        );
        commit('removeJob', id);
    },

    async updateJob ({ commit }, updJob) {
        console.log(updJob, 'Data received from components');
        const response = await axios.put(
            `/job/${updJob.id}/edit`,
            updJob
        );
        console.log(response.data, 'response');
        commit('editJob', response.data);
    },

};

const mutations = {
    setJobs: (state, jobs) => (state.jobs = jobs),
    addNewJob: (state, newJob) => (state.jobs.unshift(newJob)),
    removeJob: (state, id) => state.jobs = state.jobs.filter(job => job.id != id),
    editJob: (state, updateJob) => {
        const index = state.jobs.findIndex(job => job.id === updateJob.id)
        if(index !== -1){
            state.jobs.splice(index,1,updateJob)
        }
    },
}; 

export default {
    state,
    getters,
    actions,
    mutations
}