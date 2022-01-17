<template>
  <component :is="tag">
    <div class="layout-footer">
      <address class="layout-footer__copyright">
        <span class="layout-footer__copyright-mark">&copy;</span> amiten inc.
        All Rights Reserved.
      </address>
    </div>
  </component>
</template>

<script setup lang="ts">
interface Props {
  tag?: string
}
withDefaults(defineProps<Props>(), {
  tag: 'footer',
})
</script>

<style lang="scss" scoped>
.layout-footer {
  // .layout-footer__copyright

  &__copyright {
    display: flex;
    align-items: center;
    justify-content: center;
    font-style: normal;
  }

  // .layout-footer__copyright-mark

  &__copyright-mark {
    position: relative;
    top: 0.1em;
  }
}
</style>
