<template>
  <div>
    <p>Test pages component</p>
    <h2>icon test</h2>
    <div class="material-icons">home</div>
    <div class="icon-test" />
    <div class="gap-test" />
    <div class="color-test is-darken" />
    <div class="color-test" />
    <div class="color-test is-lighten" />
  </div>
</template>

<style lang="scss" scoped>
.icon-test {
  &::before {
    @include font-icon;
    content: 'home';
  }
}

.gap-test {
  width: $gap-xl;
  height: $gap-xl;
  background-color: red;
}

.color-test {
  display: inline-block;
  width: $gap-xl;
  height: $gap-xl;
  background-color: $color-dark;

  &.is-lighten {
    background-color: $color-dark-lighten;
  }

  &.is-darken {
    background-color: $color-dark-darken;
  }
}
</style>
