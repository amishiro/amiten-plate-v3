<?php
/**
 * Helpers: ニーズに合わせて変更してください。
 */

// 1)defineで初期値を指定
require_once __DIR__ . '/defines.php';

// 2)head.meta関連のクラス
// サイト名と共通のディスクリプション、また、メインのOGP画像を指定してください。
require_once __DIR__ . '/meta.php';
$meta = new MetaClass();
$meta->siteName = 'サイト名';
$meta->siteDesc = 'サイト共通のディスクリプション';
// $meta->siteImage = "home.jpg";

// 3)Viteに必要なエントリを出力
require_once __DIR__ . '/vite.php';