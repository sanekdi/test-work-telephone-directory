<template>
  <div class="v-input">
    <span class="label" v-if="label">{{ label }}</span>
    <input :value="value" @input="formatPhone" class="text-input" type="tel" />
    <span class="errors" v-if="errors.length">
      <div class="error" v-for="text in errors" :key="text">{{ text }}</div>
    </span>
  </div>
</template>

<script>
export default {
  name: 'v-input-phone',
  data() {
    return {

    }
  },
  props: {
    value: [String, Number],
    label: {
      type: String,
      default: '',
    },
    errors: {
      type: Array,
      default() {
        return []
      },
    },
  },

  methods: {
    input(event) {
      this.$emit('input', event.target.value)
    },

    formatPhone(event) {

      const x = this.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
      this.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');

      console.log(this.value)

      this.$emit('input',this.value)
    }
  },
}
</script>

<style lang="scss" scoped>
.v-input {
  padding: 10px 0;

  .text-input {
    width: 100%;
    display: inline-block;
    border: 2px solid #ccc;
    height: 32px;
    padding: 4px 10px;
  }

  span {
    display: inline-block;
    margin: 2px 0;

    .label {
      font-size: 12px;
      font-weight: 700;
    }
  }

  .error {
    color: red;
  }
}
</style>
