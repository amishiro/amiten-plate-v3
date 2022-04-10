// http://localhost:3000は開発時にViteの出力（js/css等のみ）提供します。

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import liveReload from 'vite-plugin-live-reload'
import eslintPlugin from 'vite-plugin-eslint'
import stylelintPlugin from 'vite-plugin-stylelint'
import viteFonts from 'vite-plugin-fonts'
// import path from 'path'
import { resolve } from 'path'
import dotenv from 'dotenv'
const envFile =
  process.env.MODE === 'production' ? '.env.production' : '.env.development'
dotenv.config({ path: envFile })
const baseDir = process.env.BASE_DIR ? process.env.BASE_DIR : ''

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
    // @charset関連のviteバグ回避
    // docs: https://github.com/vitejs/vite/discussions/5079
    postcss: {
      plugins: [
        {
          postcssPlugin: 'internal:charset-removal',
          AtRule: {
            charset: (atRule) => {
              if (atRule.name === 'charset') {
                atRule.remove()
              }
            },
          },
        },
      ],
    },
  },

  // config
  root: 'vite',
  base: '',
  build: {
    outDir: resolve(__dirname, `./dist/${baseDir}`),
    emptyOutDir: true,
    assetsDir: './assets',
    manifest: true,
    rollupOptions: {
      input: {
        // エントリポイントを増やす(js/styleを分割する)時は、以下を増やしていく
        home: resolve(__dirname, './vite/home.js'),
      },
    },
  },

  // サーバー：docker合わせ
  server: {
    host: true,
  },

  // エイリアス追加
  // https://v3.vuejs.org/guide/installation.html#with-a-bundler
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js',
      '@': path.join(__dirname, './vite'),
    },
  },
})
