> thanks: [vite-php-setup](https://github.com/andrefelipe/vite-php-setup)

## 目的

PHPアプリを実行し、開発中はvite(例：http://localhost:3000 )から提供されるjs/styleを利用します。
テンプレートはあくまでPHPアプリでありSPAを提供しません。viteはvueファイル（SFC）コンポーネントの再利用性を高める目的で利用されます。

## SETTING

```
// docker-compose.ymlの以下二つの「project-name」をプロジェクに合わせて変更する。
// ※複数コンテナを共存させるため

1）container_name: php-project-name
2）container_name: vite-project-name
```

## QUICK START

```
docker-compose up -d
```

### ETC　COMMAND

- `npm run dist`: 本番環境用ファイルをdistディレクトリへ出力
- `npm run preview`: distディレクトリをプレビュー
- `npm run dev:link-assets`: 開発中にassetsのエイリアス消しちゃった時のコマンド

## SETTING

### env

.envファイルを利用して書き出し先のディレクトリ構成などを変更できます。
PHPアプリの本番設置先のディレクトリ構成に合わせて指定します。

- `BASE_DIR=dirName`: プロダクション（.env.production）が実行されます。

### typescript/eslint

研究中です。また、レガシーブラウザは未対応です。

eslint及びvscodeの設定は[こちら](https://vueschool.io/articles/vuejs-tutorials/eslint-and-prettier-with-vite-and-vue-js-3/)を参考に、以下を修正して利用しています。

変更箇所：volarとtypescriptを入れてます。

- [volar](https://marketplace.visualstudio.com/items?itemName=johnsoncodehk.volar)、[Vue 3 Snippets](https://marketplace.visualstudio.com/items?itemName=hollowtree.vue-snippets)を追加しています。
> ### 知己の問題1
> vscode機能拡張の[vetur](https://vuejs.github.io/vetur/)はvue3へ対応していないため、[volar](https://marketplace.visualstudio.com/items?itemName=johnsoncodehk.volar)を利用します。
> 共存できないのでveturを無効（ワークスペース）にしてください。

> ### 知己の問題2
> volarは、tsチェック時に他パッケージの影響でJSXにて@types/react優先する。そのため、classなどがエラーになる（詳しくは[issue](https://github.com/johnsoncodehk/volar/discussions/592)）。
> 一時的な対策として、[issue comment](https://github.com/johnsoncodehk/volar/discussions/592#discussioncomment-1763880)を参考にダミーの@types/reactを入れています。
> また、この問題が解決するまで、`vue-tsc`による自動チェックは見送ってます。

vscodeに、以下をインストールすると便利です。

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
大型モニターに対応するため、vwベースで指定しています。指定内容は以下を参照してください。

- 基本設定されているフォントは、`vite/styles/setting/font.scss`を確認してください。
- scssMixin`vite/styles/mixins/font.scss`でフォントのサイズを調整できます。

#### 3) viewport

- ディフォルトは`width=device-width,initial-scale=1`です。
- 320px以下を切り捨てられるように`window.outerWidth`が320px以下の場合、viewportを固定にします。

#### 4) px/rem/vw

研究中です。

- ユーザーがベースのフォントサイズを変更できるように、px→rem利用を推奨します。remベースサイズを1px = 0.1remにします。
- 固定レイアウトパーツには、`vw`、また、計算が大変な場合は、`pw($px, $design-comp-viewport)`を利用します。
- 固定レイアウトパーツに制限を設けたい場合は、`clamp()`を利用します。例：`width: clamp(10rem, pw(100, 385), 20rem);`

#### 5) breakpoint/side margin(左右マージン)/base font size

vw(固定)レイアウトを基本とし、`clamp()`で最大値・最小値を指定することで、固定レイアウトのデメリットを解消します。※デメリットとは…、例えば、表示が小さくなりすぎて文字の可読性が悪くなる、ボタンが押せなくなるなど。

デザインカンプを以下仕様にて作成する前提で、ディフォルトの設定をしています。

```
// ベースフォントサイズ

- mobile/tablet/desktop: 16px

// デザインカンプ（アートボードサイズ）

- mobile: デザインカンプ375px/左右マージン32px
- table: デザインカンプ768px/左右マージン48px
- desktop: デザインカンプ1440px/左右マージン94px

// 各項目の該当範囲

- mobile: 最小320px ← デザインカンプ375px → 最大428px
- tablet: 最小=モバイル最大+1px ← デザインカンプ768px → 最大=デスクトップ最小 - 1px
- desktop: 最小1024px ← デザインカンプ1440px → 最大1980px ※無限大だけど、仮で1980pxとする。
```

実際には、デザインカンプ（プロジェクト）に合わせて、以下scssファイルをカスタマイズします。

- base font sizeを変更する場合: `vite/styles/setting/font.scss`
- breakpointを変更する場合: `vite/styles/mixins/breakpoint.scss`
- side margin(左右マージン)を変更する場合: `vite/styles/mixins/side-margin.scss`

#### 6) base layout

- `vite/styles/setting/layout.scss`で、指定しています。

### 機能

#### 1) element

研究中です。

- エレメント用の薄いラッパーコンポーネントの作成（未実装）
- ベースエレメントをコントロールする（未実装）

### vue plugins

- [vue-scrollto](https://www.npmjs.com/package/vue-scrollto)
- [vue-3-sanitize](https://www.npmjs.com/package/vue-3-sanitize)

### meta情報の自動生成

各ページのタイトル/ディスクリプション/OGP関連を自動で出力します。
プロジェクトに合わせて`public/helpers/meta.php`をカスタマイズしてください。

### htaccess/http404page

サンプルのhtaccessと404ページを格納しています。
プロジェクト（本番環境）に合わせてカスタマイズしてください。

## 追加予定の機能

- フォーム関連の薄いラッパーコンポーネントを追加
- ありがちな薄いラッパーコンポーネントを追加
- dockerで一発起動できるようにする。
- pjaxとGTMの連携を確認して導入
- 開発環境でもディレクトリ構成を変更できるようにする

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