<template>
  <footer>
    <div class="layout-footer">
      <div class="layout-footer__inner">
        <address class="layout-footer__copyright">
          <span class="layout-footer__copyright-mark">&copy;</span> amiten inc.
          All Rights Reserved.
        </address>
      </div>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
.layout-footer {
  border-top: 1px solid #eee;

  // .layout-footer__inner

  &__inner {
    @include side-margin;
    padding-top: $gap-s;
    padding-bottom: $gap-s;
  }

  // .layout-footer__copyright

  &__copyright {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: $font-s;
    font-style: normal;
  }

  // .layout-footer__copyright-mark

  &__copyright-mark {
    position: relative;
    top: 0.1em;
  }
}
</style>
