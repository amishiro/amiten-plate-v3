// http://localhost:3000は開発時にViteの出力（js/css等のみ）提供します。

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import liveReload from 'vite-plugin-live-reload'
import eslintPlugin from 'vite-plugin-eslint'
import stylelintPlugin from 'vite-plugin-stylelint'
import viteFonts from 'vite-plugin-fonts'
import path from 'path'
import dotenv from 'dotenv'
const envFile =
  process.env.MODE === 'production' ? '.env.production' : '.env.development'
dotenv.config({ path: envFile })
const baseDir = process.env.BASE_DIR ? process.env.BASE_DIR : ''

console.log(__dirname)

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    liveReload(['../public/**/*.*']),
    eslintPlugin(),
    stylelintPlugin(),
    // docs: https://www.npmjs.com/package/vite-plugin-fonts
    // vite-plugin-fontsを利用してgoogleフォントを読み込んでいます。
    viteFonts({
      google: {
        families: [
          {
            name: 'Noto Sans JP',
            styles: 'wght@400;700',
            // ノンブロッキングレンダラー機能を無効にする ※ちらつき対策
            defer: false,
          },
        ],
      },
    }),
  ],

  // docs: https://vitejs.dev/config/#css-preprocessoroptions
  // preprocessorOptionsを利用してscssの共通変数とmixinを読み込み
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "./vite/styles/variables.scss";@import "./vite/styles/mixins.scss";`,
      },
    },
  },

  // config
  root: 'vite',
  base: '',

  build: {
    outDir: path.resolve(__dirname, `./dist/${baseDir}`),
    emptyOutDir: true,
    assetsDir: './assets',
    manifest: true,
    rollupOptions: {
      input: {
        main: 'main.js',
        // js/styleを分割する場合は、以下を参考に増やしていく
        // main2: 'main2.js',
      },
    },
  },

  server: {
    host: true,
  },

  // https://v3.vuejs.org/guide/installation.html#with-a-bundler
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js',
    },
  },
})
