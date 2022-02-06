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
    tel: {
      type: Boolean,
      default: false,
    },
    pattern:{
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

