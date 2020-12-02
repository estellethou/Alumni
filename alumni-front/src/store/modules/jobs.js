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
        console.log(newJob);
        const response = await axios.post(
            'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/jobs/post',
            newJob
        );
        console.log(response.data);
        commit('addNewJob', response.data);
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
    editJob: () => { return true },

}; 

export default {
    state,
    getters,
    actions,
    mutations
}