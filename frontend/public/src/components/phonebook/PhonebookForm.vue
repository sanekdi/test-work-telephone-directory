<template>
  <div class="form">
    <div class="wrap-close-btn">
      <v-button-close @close="$emit('close', false)" />
    </div>
    <h2>{{title}}</h2>
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
      tel
      pattern="2[0-9]{3}-[0-9]{3}"
    />
    <v-input
      label="Категория"
      v-model.trim="phonebook.category"
      :errors="errorForm.category"
    />
    <v-button class="btn-primary" @click="savePhonebook">{{nameBtn}}</v-button>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import VButtonClose from "../UI/VButtonClose";
export default {
  components: {VButtonClose},
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
    }
  },
  props: {
    edit: {
      type: Boolean,
      default: false,
    },
    phonebook: {
      type: Object,
      default: function(){
        return  {
          id: null,
          family: '',
          name: '',
          middle_name: '',
          phone: '',
          category: '',
        }
      }
    }
  },
  computed: {
    title() {
      return this.edit ? 'Редактирование записи' : 'Добавление новой записи'
    },
    nameBtn() {
      return this.edit ? 'Сохранить' : 'Добавить'
    },
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

            for (let key in this.errorForm) {
              let keyError = 'phonebook.' + key

              if (typeof errorMessage[keyError] !== 'undefined') {
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
  position: relative;

  .wrap-close-btn {
    right: 10px;
    top: 10px;
    width: 40px;
    position: absolute;
  }

  h2 {
    color: #f39c12;
  }

  .btn-close {

      display:inline-block;
      height: 20px;
      width: 20px;
      border-radius: 50%;
      border: 1px solid red;
      vertical-align: center;
  }
}
</style>
