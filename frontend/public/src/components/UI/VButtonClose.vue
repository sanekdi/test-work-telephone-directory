<template>
  <div class="close-btn" @click="click"></div>
</template>

<script>
export default {
  name: 'v-button-close',
  methods: {
    click() {
      this.$emit('close', false)
    }
  }

}
</script>

<style scoped>
.close-btn {
  width: 40px;
  height: 40px;
  border-radius: 40px;
  position: relative;
  z-index: 1;
  cursor: pointer;
}
.close-btn:before {
  content: '+';
  color: #337AB7;
  position: absolute;
  z-index: 2;
  transform: rotate(45deg);
  font-size: 50px;
  line-height: 1;
  top: -5px;
  left: 6px;
  transition: all 0.3s cubic-bezier(0.77, 0, 0.2, 0.85);
}
.close-btn:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background: #337AB7;
  z-index: 1;
  transition: all 0.3s cubic-bezier(0.77, 0, 0.2, 0.85);
  transform: scale(0.01);
}
.close-btn:hover:after {
  transform: scale(1);
}
.close-btn:hover:before {
  transform: scale(0.8) rotate(45deg);
  color: #fff;
}
</style>