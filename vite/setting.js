/**
 * エントリポイントの共通設定
 */

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

// components
const components = import.meta.globEager('./components/**/*.vue')
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

export { plugins, components, importComponent }
