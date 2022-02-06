<template>
  <div class="phonebook-item">
    <div class="item name">{{ full_name }}</div>
    <div class="item phone">{{ phonebook.phone }}</div>
    <div class="item organization">{{ phonebook.category }}</div>
    <div class="item action">
      <v-button
        class="btn-orange"
        @click="editPhonebook(phonebook)"
      >
        Редактироать
      </v-button>
      <v-button
          primary
          :disabled="isDisabledButtonDelete"
          @click="deletePhonebook(phonebook.id)"
      >
        Удалить
      </v-button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'phonebook-item',
  props: {
    phonebook: {
      type: Object,
      default: () => {
        return {}
      },
    },
  },
  data() {
    return { isDisabledButtonDelete: false }
  },
  computed: {
    full_name() {
      return `${this.phonebook.family} ${this.phonebook.name} ${this.phonebook.middle_name}`
    },
  },

  methods: {
    deletePhonebook(id) {
      this.isDisabledButtonDelete = true
      this.$emit('deletePhonebook', id)
    },
    editPhonebook(phonebook) {
      this.$emit('editPhonebook', {...phonebook})
    },
  },
}
</script>

<style lang="scss" scoped>
.phonebook-item {
  display: flex;
  justify-content: space-around;

  .item {
    flex-basis: 25%;
    padding: 10px 8px;
    text-align: left;
  }
  .action .btn {
    margin-right: 15px;
  }
}

.phonebook-item:hover {
  background: #f1f1f1;
}
</style>
