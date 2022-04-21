import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    offers: [],
    demands: [],
    isLoggedIn: false,
  },
  getters: {},
  mutations: {
    SET_OFFERS(state, offers) {
      state.offers.push(...offers);
    },
    SET_DEMANDS(state, demands) {
      state.demands.push(...demands);
    },
    SET_IS_LOGGED_IN(state, isLoggedIn) {
      state.isLoggedIn = isLoggedIn;
    },
  },
  actions: {
    async getOffers({ commit }) {
      axios
        .get("http://tonbook.io/api/offer")
        .then((response) => {
          console.log(response.data);
          commit("SET_OFFERS", response.data);
        })
        .catch((err) => console.log(err));
    },
    async getDemands({ commit }) {
      axios
        .get("http://tonbook.io/api/demand")
        .then((response) => {
          console.log(response.data);
          commit("SET_DEMANDS", response.data);
        })
        .catch((err) => console.log(err));
    },
    setIsLoggedIn({ commit },isLoggedIn) {
      commit("SET_IS_LOGGED_IN",isLoggedIn );
    },
  },
  modules: {},
});
