<?php require_once __DIR__ . '/helpers/index.php'; ?>
<!DOCTYPE html>
<html
  prefix="og:http://ogp.me/ns#"
  lang="ja"
>

<head>
  <?php echo $meta->base(); ?>
  <?php echo $meta->title('Page Not Found'); ?>
  <?php echo $meta->description('ディスクリプション2'); ?>
  <?php echo $meta->ogp(); ?>
  <?php echo vite('http404.js'); ?>
</head>

<body
  itemscope
  itemtype="http://schema.org/WebPage"
>
  <div
    id="app"
    class="layout"
  >
    <layout-header class="layout__header"></layout-header>

    <layout-main class="layout__main">
      <the-header
        title="Page Not Found"
        sub="音速で探しましたが、お探しのページが見つかりませんでした。"
      ></the-header>
      <p>
        お客さまがお探しのページが見つかりませんでした。URLが正しく入力されているかどうか、もう一度ご確認ください。
        <br>正しく入力してもページが表示されない場合は、ページが移動したか、もしくは掲載期間が終了し削除された可能性がございます。
      </p>
      <base-button
        href=""
        icon="reply"
        is-outline
      >
        Go To Page Top
      </base-button>
    </layout-main>

    <layout-footer class="layout__footer"></layout-footer>
</body>

</html>