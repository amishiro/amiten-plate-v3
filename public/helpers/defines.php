<?php
/**
 * defineで初期値を指定
 */

// SSL通信かどうか指定
define('HTTPS', empty($_SERVER['HTTPS']) ? 'http://' : 'https://');

// プロキシ経由に対応したHTTP_HOSTを指定
define('HTTP_HOST', defineHttpHost());

// 現在のディレクトリ名とファイル名を返却
define('REQUEST_URI', $_SERVER['REQUEST_URI']);

// ルートディレクトリ（helpers.phpの位置）を返却
define('BASE_URL', defineBaseUrl('/helpers'));

// ---------------------- functions

/**
 * HTTP_HOSTを返却
 *
 * プロキシ経由の場合はHTTP_X_FORWARDED_HOSTを、ない場合はHTTP_HOSTを取得します。
 * 複数ある場合は、先頭のHOSTを定義します。
 */
function defineHttpHost(): string
{
  // HOSTデーターを取得
  if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $hostString = $_SERVER['HTTP_X_FORWARDED_HOST'];
  } else {
    $hostString = $_SERVER['HTTP_HOST'];
  }
  // 「,」で分割
  $hostAry = explode(',', $hostString);
  return $hostAry[0];
}

/**
 * ルートディレクトリ（helpers.phpの位置）を返却
 *
 * defines.phpが置かれているディレクトリを参照してしまうので、
 * 明示的に、str_replaceで削除して、値を返却します。
 */
function defineBaseUrl($replaceDir = ''): string
{
  $word = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__));
  $word = str_replace($replaceDir, '', $word);
  return $word . '/';
}
?>