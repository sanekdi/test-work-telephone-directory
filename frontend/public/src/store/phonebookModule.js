import axios from 'axios'

const URL_API = 'http://127.0.0.1:8000/api/v1/directories/'

export const phonebookModule = {
  state: () => ({
    phonebooks: [],
    isPostsLoading: false,

    page: 1,
    limit: 10,
    totalPages: 0,
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
      state.isPostsLoading = bool
    },

    addPhonebook(state, phonebook) {
      state.phonebooks.push(phonebook)
    },

    removePhonebookId(state, id) {
      const arr = state.phonebooks.filter(function (item) {
        return item.id != id
      })

      state.phonebooks = arr
    },
  },
  actions: {
    async fetchPhonebooks({ commit }) {
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
            //console.log(error.response)
            return Promise.reject(error)
          }
        })
    },
  },
  namespaced: true,
}

export default phonebookModule
