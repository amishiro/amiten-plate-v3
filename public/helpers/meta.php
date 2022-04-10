<?php
/**
 * head.meta関連のクラス
 *
 * 使い方
 *
 * echo $meta->base();
 * echo $meta->title("タイトル");
 * echo $meta->description("ディスクリプション");
 * echo $meta->ogp('home.jpg');
 */

class MetaClass
{
  public $siteName = 'helpers/index.phpでサイト名を指定してください';
  public $siteDesc = 'helpers/index.phpで共通のディスクリプションを指定してください';
  public $siteImage = null;
  public $pageName = null;
  public $pageDesc = null;
  /**
   * ベースとなるmeta情報を出力
   */
  function base(): string
  {
    $baseUrl = BASE_URL;
    return <<<BASE

    <meta charset="utf-8">
    <base href="$baseUrl">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    BASE;
  }

  /**
   * タイトルを出力
   * ページ個別のタイトルを引数に渡すと、$pageNameが利用可能になります。
   */
  function title($title = null): string
  {
    $this->pageName = $title;
    $title = $title ? $title . '｜' . $this->siteName : $this->siteName;
    return <<<title

    <title>$title</title>
    title;
  }

  /**
   * ディスクリプションを出力
   * ページ個別のディスクリプションを引数に渡すと、$pageDiscが利用可能になります。
   */
  function description($description = null): string
  {
    if (!isset($description)) {
      if ($this->pageName) {
        $description =
          '「' .
          $this->siteName .
          '」の' .
          $this->pageName .
          'ページです。' .
          $this->siteDesc;
      } else {
        $description = $this->siteDesc;
      }
    }

    $this->pageDesc = $description;
    return <<<description

    <meta name="description" content="$description">
    description;
  }

  /**
   * OGPを出力
   * ページ個別の画像URLを引数に渡すと、og:imageが出力されます。
   */
  function ogp($image = null): string
  {
    $thisPageUrl = HTTPS . HTTP_HOST . REQUEST_URI;
    $siteName = $this->siteName;
    $title = $this->pageName;
    $description = $this->pageDesc;

    $HTML = <<<OGP

    <meta property="og:type" content="website">
    <meta property="og:url" content="$thisPageUrl">
    <meta property="og:site_name" content="$siteName">
    <meta property="og:title" content="$title">
    <meta property="og:description" content="$description">
    OGP;

    if ($image || $this->siteImage) {
      $ogpImage = $image ? $image : $this->siteImage;
      $imageUrl = HTTPS . HTTP_HOST . BASE_URL . 'img/opg/' . $ogpImage;
      $HTML .= <<<OGP

      <meta property="og:image" content="$imageUrl">
      <meta name="twitter:card" content="summary_large_image">
      OGP;
    }

    /**
     * TODO: facebookID/TwitterIDの指定は未着手
     * <meta name="twitter:site" content="@Twitter" >
     * <meta property="article:publisher" content="FacebookURL" >
     * <meta property="fb:app_id" content="FacebookAppID" >
     */
    return $HTML;
  }
}
?>