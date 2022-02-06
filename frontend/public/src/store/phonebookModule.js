import axios from 'axios'

const URL_API = 'http://127.0.0.1:8000/api/v1/directories/'

export const phonebookModule = {
  state: () => ({
    phonebooks: [],
    isLoadingPhonebooks: false,
  }),
  getters: {
    PHONEBOOKS(state) {
      return state.phonebooks
    },
  },
  mutations: {
    setPhonebooks(state, phonebooks) {
      state.phonebooks = phonebooks
    },
    setLoading(state, bool) {
      state.isLoadingPhonebooks = bool
    },

    addPhonebook(state, phonebook) {
      state.phonebooks.push(phonebook)
    },
    editPhonebook(state, phonebook) {
      state.phonebooks  = state.phonebooks.map((item)=>{
        if(parseInt(item.id) === parseInt(phonebook.id)) {
          return phonebook
        }
        return item
      })
    },
    removePhonebookId(state, id) {
      state.phonebooks = state.phonebooks.filter(function (item) {
        return item.id != id
      })
    },
  },
  actions: {
    async fetchPhonebooks({ commit }) {

      commit('setLoading', true)

      return await axios
        .get(URL_API + 'phonebooks')
        .then((products) => {
          commit('setPhonebooks', products.data.phonebooks)
          return products
        })
        .catch((error) => {
          console.log(error)
          return error
        })
        .finally(() => {
          commit('setLoading', false)
        })
    },

    async removePhonebook({ commit }, id) {
      return await axios
        .delete(URL_API + 'phonebooks/' + id)
        .then(() => {
          commit('removePhonebookId', id)
        })
        .catch((error) => {
          console.log(error)
          return error
        })
    },

    async addPhonebook({ commit }, phonebook) {
      return await axios
        .post(URL_API + 'phonebooks', { phonebook })
        .then((phonebook) => {
          commit('addPhonebook', phonebook.data)
          return phonebook
        })
        .catch((error) => {
          if (error.response) {
            return Promise.reject(error)
          }
        })
    },

    async editPhonebook({ commit }, phonebook) {
      return await axios
        .put(URL_API + 'phonebooks/'+phonebook.id, { phonebook })
        .then((phonebook) => {
          commit('editPhonebook', phonebook.data)
          return phonebook
        })
        .catch((error) => {
          if (error.response) {
            return Promise.reject(error)
          }
        })
    },
  },
  namespaced: true,
}

export default phonebookModule
