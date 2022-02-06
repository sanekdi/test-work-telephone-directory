import Vue from 'vue'
import Vuex from 'vuex'
import { phonebookModule } from '@/store/phonebookModule'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {},
  modules: {
    phonebook: phonebookModule,
  },
})
