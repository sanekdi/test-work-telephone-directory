<template>
  <div class="home">
    <p class="wrap-create">
      <v-button @click="isModalShow=true" class="btn-orange">Добавить запись</v-button>
    </p>
    <v-modal :show="isModalShow" @close="closeModal">
      <phonebook-form @close="closeModal" />
    </v-modal>
    <phonebook-list />
  </div>
</template>

<script>
import PhonebookList from '@/components/phonebook/PhonebookList.vue'
import PhonebookForm from '@/components/phonebook/PhonebookForm.vue'

export default {
  name: 'Home',
  components: { PhonebookList, PhonebookForm },
  data() {
    return {
      isModalShow: false,
    }
  },
  methods: {
    closeModal() {
      this.isModalShow=false
    }
  }
}
</script>

<style lang="scss" scoped>
.wrap-create {
  display: flex;
  margin-bottom: 20px;
  justify-content: right;
  padding-right: 20px;
}
.home {
  margin-bottom: 40px;
}
</style>
