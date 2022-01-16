<template>
  <img alt="Vue logo" src="/assets/logo.png" height="40" />

  <h1>Vue {{ msg }}</h1>
  <div>
    <p>ディレクトリリンク</p>
    <a href="html5-test-page">html5-test-page</a> | <a href="">index</a>
  </div>

  <p>
    <a href="https://vitejs.dev/guide/features.html" target="_blank">
      Vite Documentation
    </a>
    |
    <a href="https://v3.vuejs.org/" target="_blank">Vue 3 Documentation</a>
  </p>

  <button type="button" @click="state.count++">
    count is: {{ state.count }}
  </button>

  <p>
    <code class="test">components/HelloWorld.vue</code>
    to test hot module replacement.
  </p>
</template>

<script setup>
import { reactive } from 'vue'

defineProps({
  msg: {
    type: String,
    default: 'メッセージ',
  },
})

const state = reactive({ count: 0 })
</script>
