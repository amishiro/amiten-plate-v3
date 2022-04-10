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
      <header>
        <h1>index page</h1>
      </header>
      <section>
        <?php echo '<p class="message">PHP output here, potentially large HTML chunks</p>'; ?>
        <hello-world msg="props-data"></hello-world>
        <test-file></test-file>
      </section>
    </layout-main>

    <layout-footer class="layout__footer"></layout-footer>
  </div>
</body>

</html>