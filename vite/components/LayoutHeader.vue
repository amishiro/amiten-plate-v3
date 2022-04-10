<template>
  <header>
    <div class="the-header">
      <div class="the-header__inner">
        <BaseLogo class="the-header__logo" />
        <LayoutHeaderNavigation class="the-header__navigation" />
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import BaseLogo from '@/components/BaseLogo.vue'
import LayoutHeaderNavigation from '@/components/LayoutHeaderNavigation.vue'
</script>

<style lang="scss" scoped>
.the-header {
  border-bottom: 1px solid #eee;

  // .the-header__inner

  &__inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: $gap-s;
    padding-bottom: $gap-s;
    @include side-margin;
  }

  // .the-header__logo

  &__logo {
  }

  // .the-header__navigation

  &__navigation {
  }
}
</style>
