// using workaround
// docs: https://github.com/vitejs/vite/issues/4786
// docs: https://vitejs.dev/config/#build-polyfillmodulepreload
if (import.meta.env.MODE !== 'development') {
  // @ts-expect-error
  import('vite/modulepreload-polyfill')
}

// plugins
import plugins from './plugins/_index.js'

// scripts
import '/scripts/_index.js'

// styles
import './styles/setting/_index.js'

// Vue
import { createApp } from 'vue'

// example1: すべてのコンポーネントをロード
const modules = import.meta.globEager('./components/*.vue')
const components = {}
for (const path in modules) {
  const name = path
    .split('/')
    .pop()
    .replace(/\.\w+$/, '')

  components[name] = modules[path].default
}

// example2: 手動でロード
// import HelloWorld from './components/HelloWorld.vue'
// const components = {
//   HelloWorld,
// }

/**
 * Vueアプリをインスタンス化
 * example1: targetは、単一#appの場合
 */
const app = createApp({
  components,
})
// plugins追加
for (const plugin of plugins) {
  app.use(plugin)
}
// マウント
app.mount('#app')

/**
 * Vueアプリをインスタンス化
 * example2: targetは、.vue-appクラスのラッピングdiv（複数）
 *
 * マウントされるHTML要素は、Vueによって生成されたDOMに置き換わる。
 * なので、マウントする前に、DOM操作またはイベント付与をすると、意図しない動作になる可能性がある。
 * そんな時な、対照を絞ってVueインスタンスをマウントする方針へ切り替える。
 */

// ↓ 例
// for (const el of document.getElementsByClassName('vue-app')) {
//   createApp({
//     components,
//     template: el.innerHTML,
//   }).mount(el)
// }
