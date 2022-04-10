<template>
  <div>
    <p>Test pages component</p>
    <BaseButton @on-button="method()">click me!</BaseButton>
  </div>
</template>

<script setup lang="ts">
import BaseButton from '@/components/BaseButton.vue'

const method = () => {
  alert('button click!')
}
</script>

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
