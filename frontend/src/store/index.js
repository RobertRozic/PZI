import Vue from 'vue'
import Vuex from 'vuex'
import Api from "@/plugins/Api";

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    user: null
  },
  getters: {
    getUser(state) {
      return state.user
    }
  },
  mutations: {
    saveUser(state, user) {
      state.user = user
    }
  },
  actions: {
    getUser(context) {
      Api.get('user').then(response => {
        // Save user to store
        context.commit('saveUser', response.data)
      })
    }
  },
  modules: {
  }
})
