<template>
  <nav
    itemprop="hasPart"
    itemscope
    itemtype="http://schema.org/SiteNavigationElement"
  >
    <ul class="header-navigation">
      <li
        v-for="item in navigation"
        :key="item.name"
        itemprop="hasPart"
        itemscope
        itemtype="http://schema.org/WebPage"
        class="header-navigation__item"
      >
        <a :href="item.href" itemprop="url" class="header-navigation__link">
          <span itemprop="name" class="header-navigation__text">{{
            item.name
          }}</span>
        </a>
      </li>
    </ul>
  </nav>
</template>

<script setup lang="ts">
const navigation = [
  {
    href: '',
    name: 'home',
  },
  {
    href: 'html5-test-page/',
    name: 'html5-test-page',
  },
]
</script>

<style lang="scss" scoped>
.header-navigation {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0; // 打ち消し

  // .header-navigation__item

  &__item {
    &:not(:last-child) {
      margin-right: 1vw;
    }
  }

  // .header-navigation__link

  &__link {
    display: block;
    padding: 1vw;
    color: black;
    text-decoration: none;

    &:hover {
      text-decoration: underline;
    }
  }

  // .header-navigation__text

  &__text {
  }
}
</style>
