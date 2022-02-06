<template>
  <div id="app" class="wrapper">
    <div class="content">
      <header class="wrap-header">
        <div class="header"><p class="logo">Телефонный справочник</p></div>
      </header>
      <div class="wrap-content">
        <router-view />
      </div>
    </div>
    <footer class="footer">
      <div class="wfooter">
        <p>&copy; 2022 Тестовое задание</p>
      </div>
    </footer>
  </div>
</template>

<style lang="scss">
.wfooter {
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
