<template>
  <div class="phonebook">
    <div class="phonebook-list" v-if="phonebooks.length">
      <div class="header">
        <div class="item name">ФИО</div>
        <div class="item phone">Телефон</div>
        <div class="item organization">Категория</div>
        <div class="item">&nbsp;</div>
      </div>
      <div class="body">
        <phonebook-item
          v-for="phonebook in phonebooks"
          :key="phonebook.id"
          :phonebook="phonebook"
          @deletePhonebook="deletePhonebook"
        />
      </div>
    </div>
    <div v-else>
      <p>Нет записей в телефоной книжке</p>
    </div>
  </div>
</template>

<script>
import PhonebookItem from './PhonebookItem.vue'
import { mapGetters, mapActions } from 'vuex'
export default {
  components: { PhonebookItem },
  name: 'phonebook-list',

  mounted() {
    this.fetchPhonebooks().then((response) => {
      if (response.data) {
        //console.log('Data load From Server')
      }
    })
  },

  computed: {
    ...mapGetters({
      phonebooks: 'phonebook/PHONEBOOKS',
    }),
  },

  methods: {
    ...mapActions({
      fetchPhonebooks: 'phonebook/fetchPhonebooks',
      removePhonebook: 'phonebook/removePhonebook',
    }),
    deletePhonebook(id) {
      // console.log('del: ' + id)
      this.removePhonebook(id)
    },
  },
}
</script>

<style lang="scss">
.phonebook-list {
  .header {
    display: flex;
    justify-content: space-around;
    background: #3498db;

    .item {
      text-align: left;
      flex-basis: 25%;
      padding: 8px;
      color: #fff;
    }
  }
}
</style>
