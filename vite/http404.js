import { createApp } from 'vue'
import { plugins, components, importComponent } from './setting.js'

/**
 * ページ個別のcomponentsやstylesへを指定
 */

const pageComponents = import.meta.globEager('./pages/http404/**/*.vue')
const pageStyles = import.meta.glob('./pages/http404/**/*.scss')

/**
 * 以下、vueアプリをインスタンス化など
 */

// インスタンス化
const app = createApp({
  components: {
    ...importComponent(components),
    ...importComponent(pageComponents),
  },
})

// plugins追加
for (const plugin of plugins) {
  app.use(plugin)
}

// styles追加
for (const pageStyle in pageStyles) {
  pageStyles[pageStyle]()
}

// マウント
app.mount('#app')
