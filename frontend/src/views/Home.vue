<template>
  <div class="home">
    <phonebook-form />
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
    return {}
  },
}
</script>

<style lang="scss" scoped>
.home {
  margin-bottom: 40px;
}
</style>
