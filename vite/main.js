// using workaround
// docs: https://github.com/vitejs/vite/issues/4786
// docs: https://vitejs.dev/config/#build-polyfillmodulepreload
if (import.meta.env.MODE !== 'development') {
  import('vite/modulepreload-polyfill')
}

// plugins
import plugins from './plugins/_index.js'

// scripts
import '/scripts/_index.js'

// styles
import './styles/setting/_index.js'
const styles = import.meta.glob('./pages/index/**/*.scss')
for (const path in styles) {
  styles[path]()
}

// Vue
import { createApp } from 'vue'

// コンポーネントをロード
const modules = import.meta.globEager('./components/**/*.vue')
const pageModules = import.meta.globEager('./pages/index/**/*.vue')
const importComponent = (modules) => {
  const components = {}
  for (const path in modules) {
    const name = path
      .split('/')
      .pop()
      .replace(/\.\w+$/, '')

    components[name] = modules[path].default
  }
  return components
}
const components = {
  ...importComponent(modules),
  ...importComponent(pageModules),
}

// Vueアプリをインスタンス化
const app = createApp({
  components,
})

// plugins追加
for (const plugin of plugins) {
  app.use(plugin)
}

// マウント
app.mount('#app')
