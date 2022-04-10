<template>
  <div>
    <p>Test pages component</p>
    <h2>icon test</h2>
    <div class="material-icons">home</div>
    <div class="icon-test" />
  </div>
</template>

<style lang="scss" scoped>
.icon-test {
  &::before {
    @include font-icon;
    content: 'home';
  }
}
</style>
