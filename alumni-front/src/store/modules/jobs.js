import axios from 'axios';

const state = { jobs: []};

const getters = {
    getAllJobs: (state) => state.jobs,
};

const actions = {
    async fetchAllJobs({ commit }) {
        const response = await axios.get(
            'http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/api/jobs'
        );

        console.log(response.data)

        commit('setJobs', response.data)
    },

};

const mutations = {
    setJobs: (state, jobs) => (state.jobs = jobs),

}; 

export default {
    state,
    getters,
    actions,
    mutations
}