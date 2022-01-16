module.exports = {
  root: true,
  env: {
    browser: true,
    node: true,
  },
  // ↓ 基本設定
  extends: ['plugin:vue/vue3-recommended', 'prettier'],
  // ↓ 追加設定 ※基本設定項目の除外がメイン
  rules: {
    'comma-dangle': ['error', 'only-multiline'], // 末尾のセミコロンを許容する。
    'no-multiple-empty-lines': ['warn', { max: 1 }], // 空白行に対してwarnのみ出るようにする。
    // セルフクローズを解除
    'vue/html-self-closing': [
      'error',
      {
        html: {
          void: 'always',
        },
      },
    ],
  },
  // ↓ cdn読み込みなどのグローバル変数
  globals: {
    // ↓vue3
    defineProps: 'readonly',
    // Vue: true,
    // $: true,
    // Modernizr: true
  },
}
