<template>
  <component :is="tag">
    <div class="the-header">
      <div class="the-header__inner">
        <BaseLogo class="the-header__logo" />
        <TheHeaderNavigation class="the-header__navigation" />
      </div>
    </div>
  </component>
</template>

<script setup>
import BaseLogo from './BaseLogo.vue'
import TheHeaderNavigation from './TheHeaderNavigation.vue'

defineProps({
  tag: {
    type: String,
    default: 'header',
  },
})
</script>

<style lang="scss" scoped>
.the-header {
  // .the-header__inner

  &__inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  // .the-header__logo

  &__logo {
  }

  // .the-header__navigation

  &__navigation {
  }
}
</style>
