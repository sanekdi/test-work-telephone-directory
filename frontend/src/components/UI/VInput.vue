<template>
  <div class="v-input">
    <span class="label" v-if="label">{{ label }}</span>
    <input :value="value" @input="input" class="text-input" type="text" />
    <span class="errors" v-if="errors.length">
      <div class="error" v-for="text in errors" :key="text">{{ text }}</div>
    </span>
  </div>
</template>

<script>
export default {
  name: 'v-input',
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
