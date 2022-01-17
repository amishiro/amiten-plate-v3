<template>
  <div>
    <header class="the-main-header">
      <!-- eslint-disable-next-line vue/no-v-html -->
      <h1 v-html="$sanitize(title)" />
      <!-- eslint-disable-next-line vue/no-v-html -->
      <p v-if="sub" v-html="$sanitize(sub)" />
    </header>
  </div>
</template>

<script setup>
defineProps({
  // タイトル
  title: {
    type: String,
    default: 'タイトル',
  },

  // サブタイトル（補足説明）
  sub: {
    type: String,
    default: undefined,
  },
})
</script>
