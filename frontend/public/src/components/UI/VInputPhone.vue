<template>
  <div class="v-input">
    <span class="label" v-if="label">{{ label }}</span>
    <input :value="value" @input="input" class="text-input" type="tel" />
    <span class="errors" v-if="errors.length">
      <div class="error" v-for="text in errors" :key="text">{{ text }}</div>
    </span>
  </div>
</template>

<script>
export default {
  name: "v-input-phone",
  data() {
    return {};
  },
  props: {
    value: [String, Number],
    label: {
      type: String,
      default: "",
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
      let formatPhone = ''
      const inputValue = event.target.value
      let inputNumbersValue = inputValue.replace(/\D/g, '')

      if (!inputNumbersValue) {
        event.target.value = formatPhone
        this.$emit("input", formatPhone)
        return;
      }

      if (["7", "8", "9"].indexOf(inputNumbersValue[0]) > -1) {
        if (inputNumbersValue[0] == '9')
          inputNumbersValue = '7' + inputNumbersValue
        let firstSymbols = inputNumbersValue[0] == "8" ? '8' : '+7'
        formatPhone = firstSymbols + ' '
        if (inputNumbersValue.length > 1) {
          formatPhone += '(' + inputNumbersValue.substring(1, 4);
        }
        if (inputNumbersValue.length >= 5) {
          formatPhone += ') ' + inputNumbersValue.substring(4, 7);
        }
        if (inputNumbersValue.length >= 8) {
          formatPhone += '-' + inputNumbersValue.substring(7, 9);
        }
        if (inputNumbersValue.length >= 10) {
          formatPhone += '-' + inputNumbersValue.substring(9, 11);
        }
      } else {
        formatPhone = '+' + inputNumbersValue.substring(0, 16);
      }
      event.target.value = formatPhone;

      this.$emit('input', formatPhone);
    },
  },
};
</script>
