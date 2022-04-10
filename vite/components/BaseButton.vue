<template>
  <div>
    <component
      :is="tag"
      :href="href"
      :target="target"
      class="base-button"
      :class="addClass"
      @click="emit('onButton')"
    >
      <div class="base-button__inner">
        <span class="base-button__text"><slot /></span>
        <span class="base-button__icon material-icons">{{ icon }}</span>
      </div>
    </component>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'

interface Props {
  href?: string
  target?: string
  icon?: string
  isFull?: boolean
  isOutline?: boolean
}

const props = withDefaults(defineProps<Props>(), {
  href: undefined,
  target: undefined,
  icon: 'arrow_right',
})

const tag = computed(() => {
  if (props.href !== undefined) return 'a'
  else return 'button'
})

const addClass = computed(() => {
  return [{ 'is-full': props.isFull }, { 'is-outline': props.isOutline }]
})

const emit = defineEmits(['onButton'])
</script>

<style lang="scss" scoped>
.base-button {
  @include reset-button;
  display: flex;
  align-items: center;
  width: 100%;
  max-width: 400px;
  min-height: $gap-xl;
  padding: $gap $gap-m;
  color: white;
  text-decoration: none;
  text-transform: none;
  background-color: $color-primary;
  border: 1px solid $color-primary;

  &:hover {
    background-color: $color-primary-lighten;
  }

  &.is-full {
    max-width: 100%;
  }

  &.is-outline {
    color: $color-primary;
    background-color: white;

    &:hover {
      color: white;
      background-color: $color-primary-lighten;
    }
  }

  // .base-button__inner

  &__inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
  }

  // .base-button__text

  &__text {
  }

  // .base-button__icon

  &__icon {
  }
}
</style>
