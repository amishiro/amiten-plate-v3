module.exports = {
  stories: [
    // "../vite/components/**/*.stories.mdx",
    '../vite/components/**/*.stories.@(js|jsx|ts|tsx)',
  ],
  addons: [
    '@storybook/addon-links',
    '@storybook/addon-essentials',
    // ↓ postcss8を利用する（通常7）
    {
      name: '@storybook/addon-postcss',
      options: {
        postcssLoaderOptions: {
          implementation: require('postcss'),
        },
      },
    },
  ],
  framework: '@storybook/vue3',
  core: {
    builder: 'storybook-builder-vite',
  },
  async viteFinal(config) {
    return {
      ...config,
      // ↓ viteで指定したscssの共通変数とmixinをstorybookでも読み込み
      css: {
        ...config.css,
        preprocessorOptions: {
          scss: {
            additionalData: `@import "./vite/styles/variables.scss";@import "./vite/styles/mixins.scss";`,
          },
        },
      },
    }
  },
}
