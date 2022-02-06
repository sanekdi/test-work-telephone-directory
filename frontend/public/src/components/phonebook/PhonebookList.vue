<template>
  <div class="phonebook">
    <v-modal :show="isModalShow" @close="closeModal">
      <phonebook-form @close="closeModal" :phonebook="phonebookData" edit />
    </v-modal>
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
          @editPhonebook="editPhonebook"
        />
      </div>
    </div>
    <div v-else>
      <p class="empty-book">Нет записей в телефоной книжке</p>
    </div>
  </div>
</template>

<script>
import PhonebookForm from '@/components/phonebook/PhonebookForm.vue'
import PhonebookItem from './PhonebookItem.vue'
import { mapGetters, mapActions } from 'vuex'
export default {
  components: { PhonebookForm, PhonebookItem },
  name: 'phonebook-list',

  mounted() {
    this.fetchPhonebooks().then((response) => {
      if (response.data) {
        //console.log('Data load From Server')
      }
    })
  },
  data() {
    return {
      isModalShow: false,
      phonebookData: {},
    }
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
    editPhonebook(phonebook) {
     this.isModalShow = true
      this.phonebookData = phonebook
    },
    deletePhonebook(id) {
      this.removePhonebook(id)
    },
    closeModal() {
      this.isModalShow=false
    }
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
.empty-book {
  width: 100%;
  height: 100px;
  display: flex;
  align-items: center;
  border:1px solid #dedede;
  margin: 20px 0;
  justify-content: center;
  font-weight: bold;
  background: #f1f1f1;
  color: #f39c12;
}
</style>
