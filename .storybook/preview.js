// plugins追加
import { app } from '@storybook/vue3'
import plugins from '../vite/plugins/_index.js'
for (const plugin of plugins) {
  app.use(plugin)
}

// styles追加
import '../vite/styles/setting/_index.js'

export const parameters = {
  actions: { argTypesRegex: '^on[A-Z].*' },
  controls: {
    matchers: {
      color: /(background|color)$/i,
      date: /Date$/,
    },
  },
}
