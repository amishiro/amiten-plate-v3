<template>
  <main>
    <div class="layout-main">
      <div class="layout-main__inner">
        <slot />
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
.layout-main {
  // .layout-main__inner

  &__inner {
    @include side-margin;
  }
}
</style>
