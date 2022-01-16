module.exports = {
  // ↓ 基本設定
  extends: [
    'stylelint-config-standard-scss',
    'stylelint-config-recommended-vue/scss',
    'stylelint-config-recess-order',
  ],
  // ↓ 追加設定 ※基本設定項目の除外がメイン
  rules: {
    'block-no-empty': null, // 空のブロックの指定をしない
    'font-family-no-missing-generic-family-keyword': null, // font-familyに関する指定をしない
    'no-descending-specificity': null, // 詳細度並び順の指定をしない
    'comment-empty-line-before': null, // コメント前へ改行を入れる指定をしない
    'at-rule-empty-line-before': null, // @前へ改行をいれる指定をしない
    'declaration-empty-line-before': null, // @後や--後へ改行をいれる指定をしない
    'selector-type-no-unknown': [
      // セレクタータイプチェックの除外指定
      true, // 基本はチェックする
      { ignoreTypes: ['_', 'x'] }, // チェック除外項目
    ],
  },
}
