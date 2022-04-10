<?php require_once __DIR__ . '/helpers/index.php'; ?>
<!DOCTYPE html>
<html
  prefix="og:http://ogp.me/ns#"
  lang="ja"
>

<head>
  <?php echo $meta->base(); ?>
  <?php echo $meta->title(); ?>
  <?php echo $meta->description(); ?>
  <?php echo $meta->ogp(); ?>
  <?php echo vite('home.js'); ?>
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
        title="IndexPage"
        sub="sub text dummy"
      ></the-header>

      <section>

        <h2>sample base component</h2>
        <base-button href="http404.php">Go To Not found page</base-button>
        <br>
        <base-button
          href="http404.php"
          is-full
        >is full</base-button>
        <br>
        <base-button
          href="http404.php"
          is-outline
        >is outline</base-button>

        <hr>

        <h2>sample page component</h2>

        <test-file></test-file>
      </section>
    </layout-main>

    <layout-footer class="layout__footer"></layout-footer>
  </div>
</body>

</html>