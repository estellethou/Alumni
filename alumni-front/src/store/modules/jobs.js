import axios from 'axios';

const state = { jobs: []};

const getters = {
    getAllJobs: (state) => state.jobs,
};

const actions = {
    async fetchAllJobs ({ commit }) {
        const response = await axios.get(
            'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/jobs'
        );
        commit('setJobs', response.data);
    },

    async addJob ({ commit }, newJob) {
        const response = await axios.post(
            'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/jobs/post',
            newJob
        );
        commit('addNewJob', response.data);
    },

    async deleteJob({ commit}, id) {
        await axios.delete(
            `http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/job/${id}`
        );
        commit('removeJob', id);
    },

    async updateJob ({ commit }, updJob) {
        console.log(updJob);
        const response = await axios.put(
            `http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/job/${updJob.id}/edit`,
            updJob
        );
        console.log(response.data);
        commit('editJob', response.data);
    },

};

const mutations = {
    setJobs: (state, jobs) => (state.jobs = jobs),
    addNewJob: (state, newJob) => (state.jobs.unshift(newJob)),
    removeJob: (state, id) => state.jobs = state.jobs.filter(job => job.id != id),
    editJob: () => { return true },

}; 

export default {
    state,
    getters,
    actions,
    mutations
}