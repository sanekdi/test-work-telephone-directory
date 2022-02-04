<template>
  <div class="form">
    <h2>Добавление новой записи</h2>
    {{ error }}
    <v-input
      label="Фамилия"
      v-model.trim="phonebook.family"
      :errors="errorForm.family"
    />
    <v-input
      label="Имя"
      v-model.trim="phonebook.name"
      :errors="errorForm.name"
    />
    <v-input
      label="Отчество"
      v-model.trim="phonebook.middle_name"
      :errors="errorForm.middle_name"
    />
    <v-input
      label="Телефон"
      v-model.trim="phonebook.phone"
      :errors="errorForm.phone"
    />
    <v-input
      label="Категория"
      v-model.trim="phonebook.category"
      :errors="errorForm.category"
    />
    <v-button class="btn-primary" @click="savePhonebook">Создать</v-button>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
  data() {
    return {
      errorForm: {
        family: [],
        name: [],
        middle_name: [],
        phone: [],
        category: [],
      },
      error: '',
      phonebook: {
        family: '',
        name: '',
        middle_name: '',
        phone: '',
        category: '',
      },
    }
  },
  methods: {
    ...mapActions({
      addPhonebook: 'phonebook/addPhonebook',
    }),
    savePhonebook() {
      this.addPhonebook(this.phonebook)
        .then((response) => {
          this.$emit('close', false)
        })
        .catch((err) => {
          if (err.response.status === 422) {
            const errorMessage = err.response.data.errors

            for (var key in this.errorForm) {
              let keyError = 'phonebook.' + key

              if (typeof errorMessage[keyError] !== 'undefined') {
                console.log(keyError)
                this.errorForm[key] = errorMessage[keyError]
              }
            }
          } else {
            this.error = err.response.status + ' ' + err.response.statusText
          }
        })
    },
  },
}
</script>

<style lang="scss" scoped>
.form {
  margin: 20px 20px;
  padding: 20px;
  background: #ecf0f1;

  h2 {
    color: #f39c12;
  }
}
</style>
