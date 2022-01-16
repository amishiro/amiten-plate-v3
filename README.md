> thanks: [vite-php-setup](https://github.com/andrefelipe/vite-php-setup)

## 目的

PHPアプリを独自ローカルサーバー(例：http://127.0.0.1:3000 )で実行し、開発中はvite(例：http://localhost:3000 )から提供されるjs/styleを利用します。
テンプレート（ベース）はあくまでPHPアプリでありSPAを提供しません。viteはvueファイル（SFC）コンポーネントの再利用性を高める目的で利用されます。

## QUICK START

- `npm run dev`: 開発環境を立ち上げ
- `npm run dist`: 本番環境用ファイルをdistディレクトリへ出力
- `npm run preview`: distディレクトリをプレビュー
- `npm run storybook`: storybookを立ち上げ

## SETTING

### env

.envファイルを利用して書き出し先のディレクトリ構成などを変更できます。
PHPアプリの本番設置先のディレクトリ構成に合わせて指定します。

- `BASE_DIR=dirName`: プロダクション（.env.production）が実行されます。

### js/eslint

研究中です。

大規模を想定していないため、typescriptやIE11などのレガシーブラウザは未対応です。

eslint及びvscodeの設定は[こちら](https://vueschool.io/articles/vuejs-tutorials/eslint-and-prettier-with-vite-and-vue-js-3/)を参考に、以下を修正して利用しています。

変更箇所：

- [volar](https://marketplace.visualstudio.com/items?itemName=johnsoncodehk.volar)、[Vue VSCode Snippets](https://marketplace.visualstudio.com/items?itemName=sdras.vue-vscode-snippets)、[Vue 3 Snippets](https://marketplace.visualstudio.com/items?itemName=hollowtree.vue-snippets)を追加しています。

※vscode機能拡張の[vetur](https://vuejs.github.io/vetur/)は、vue3へ対応していないため、[volar](https://marketplace.visualstudio.com/items?itemName=johnsoncodehk.volar)を利用します。共存できない的な記事がありますが、2022/1/15時点では問題なく共存できています。

- volarのtsチェックにて、vueファイルのtemplateがJSX扱いになって、classなどがエラーになる。解決策、探し中。

vscodeに、以下をインストールすると便利です。

- [vetur](https://vuejs.github.io/vetur/)
- [Vue VSCode Snippets](https://marketplace.visualstudio.com/items?itemName=sdras.vue-vscode-snippets)
- [volar](https://marketplace.visualstudio.com/items?itemName=johnsoncodehk.volar)
- [Vue 3 Snippets](https://marketplace.visualstudio.com/items?itemName=hollowtree.vue-snippets)
- [prettier](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)
- [eslint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)

### scss/stylelint

scssが利用できます。また、`./vite/styles/mixins.scss`及び`./vite/styles/variables.scss`を共通SCSSとしてglobalへ読み込みます。

stylelint及びvscodeの設定は[こちら](https://github.com/ota-meshi/stylelint-config-recommended-vue)を参考にしています。

vscodeに、以下をインストールすると便利です。

- [stylelint](https://marketplace.visualstudio.com/items?itemName=stylelint.vscode-stylelint)

### css設計

#### 1) css reset

- ベースのリセットには、[sanitize.css](https://csstools.github.io/sanitize.css/)を利用しています。`vite/styles/setting.js`でカスタマイズできます。
- 追加で、フォーム要素を完全にリセットします。（未実装）

#### 2) css font

研究中です。

- クラウドフォントは、[vite-plugin-fonts](https://www.npmjs.com/package/vite-plugin-fonts)を利用して読み込みます。`vite.config.js`の`defineConfig.plugins.viteFonts`でカスタマイズできます。また、ディフォルトでは、ノンブロッキング機能を無効化（ちらつき対策のため）しています。

- ベースのフォントサイズは1.6rem(16px)です。

```
font-size: 1.6rem;
font-size: clamp(1.4rem, px-to-vw(16px, 385px), 1.6rem);
```

#### 3) viewport

研究中です。

- ディフォルトは`width=device-width,initial-scale=1`です。
- 320px以下を切り捨てられるように`window.outerWidth`が320px以下の場合、viewportを固定にします。

#### 4) px/rem/vw

研究中です。

- ユーザーがベースのフォントサイズを変更できるように、px→rem利用を推奨します。remベースサイズを1px = 0.1remにします。
- 固定レイアウトパーツには、`vw`、また、計算が大変な場合は、`px-to-vw($px, $design-comp-viewport)`を利用します。
- 固定レイアウトパーツに制限を設けたい場合は、`clamp()`を利用します。例：`width: clamp(10rem, px-to-vw(100, 385), 20rem);`

#### 5) element

研究中です。

#### 6) base layout

- `vite/styles/setting/layout.scss`で、指定しています。

### vue plugins

- [vue-scrollto](https://www.npmjs.com/package/vue-scrollto)
- [vue-3-sanitize](https://www.npmjs.com/package/vue-3-sanitize)

### meta情報の自動生成

各ページのタイトル/ディスクリプション/OGP関連を自動で出力します。
プロジェクトに合わせて`public/helpers/meta.php`をカスタマイズしてください。

### htaccess/http404page

サンプルのhtaccessと404ページを格納しています。
プロジェクト（本番環境）に合わせてカスタマイズしてください。

### storybook(vue component samples)

[ここ](https://storybook.js.org/blog/storybook-for-vite/)を参考にしています。

- postcss8を利用したいので[@storybook/addon-postcss](https://storybook.js.org/addons/@storybook/addon-postcss)をインストールしてカスタマイズしています。

## 追加予定の機能

- pjaxとGTMの連携を確認して導入する
- 便利なコンポーネントを入れ込んでテストする
- 開発環境でもディレクトリ構成を変更できるようにする
- distをpreviewとdistに分けてgithub action等でデプロイしやすくする

## 注意事項

### 開発中のViteのポート

Vite（vite.config.js）で指定したポートと、phpヘルパー（public/helpers.php）で指定したポートが一致する必要があります。
開発中の内部では、phpヘルパーで指定したポートが存在する場合、開発中のViteを参照します。

### 開発中のViteのアセット

アセットフォルダーを利用する場合は、開発サーバーにシンボリックリンクを作成する必要があります。
[Vite docs](https://vitejs.dev/guide/backend-integration.html)に記載されているように、これは予想される制限です。

- `npm run dev`で自動的にシンボリックを作成します。
- 手動で動作を確認したい場合は、`npm run dev:link-assets`を実行してください。

### 複数のエントリのヒント

研究中です。

複数のエントリを処理する必要がある場合（ページによって読み込むjs/styleを変更したい場合）は、vite.config.jsの`build.rollupOptions.input`へエントリポイントを追加してください。

> 参考：
> - Vite [マルチページアプリ](https://ja.vitejs.dev/guide/build.html#%E3%83%9E%E3%83%AB%E3%83%81%E3%83%9A%E3%83%BC%E3%82%B8%E3%82%A2%E3%83%97%E3%83%AA)
> - 共有のViteセットアップは、別々のビルドステップで異なるエントリを出力します[例はこちら](https://github.com/wp-bond/boilerplate/blob/master/app/themes/boilerplate/package.json)


## 動作確認済み環境

```
OS
↓
- macOS Monterey 12.0.1

node -v
↓
v16.13.1

npm -v
↓
8.1.2

php -v
↓
PHP 8.0.12
```

## その他

### url

#### staging

■閲覧用パスワード

ID：xxxx / Pass：xxxx
https://

#### production

https://