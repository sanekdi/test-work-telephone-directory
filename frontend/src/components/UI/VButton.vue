<template>
  <button :class="classes" :disabled="disabled" @click="click">
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: 'v-button',
  props: {
    primary: {
      type: Boolean,
      default: false,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    classes() {
      return {
        btn: true,
        'btn-primary': this.primary && !this.disabled,
        'btn-disabled': this.disabled,
      }
    },
  },
  methods: {
    click() {
      this.$emit('click')
    },
  },
}
</script>
