<template>
  <!-- eslint-disable vue/no-v-html -->
  <div>
    <header class="the-header">
      <div class="the-header__inner">
        <component
          :is="tag"
          class="the-header__title"
          v-html="$sanitize(title)"
        />
        <p v-if="sub" class="the-header__sub" v-html="$sanitize(sub)" />
      </div>
    </header>
  </div>
</template>

<script setup lang="ts">
interface Props {
  title: string
  sub?: string
  tag?: string
}

withDefaults(defineProps<Props>(), {
  sub: undefined,
  tag: 'h1',
})
</script>

<style lang="scss" scoped>
.the-header {
  // .the-header__inner

  &__inner {
    padding: $gap 0 $gap-s $gap-m;
    margin: $gap-m 0;
    border-left: 4px solid $color-secondary;
  }

  // .the-header__title

  &__title {
    margin: 0 0 $gap;
  }

  // .the-header__sub

  &__sub {
    margin: 0;
  }
}
</style>
