<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Demonstrates CSS layout" />
    <meta name="keywords" content="HTML5, CSS layout" />
    <meta name="author" content="Group2" />
    <meta charset="utf-8" />
    <title>CoffeeShop | Receipt</title>
    <!-- References to external CSS files -->
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
<?php
  $page = "videoPage";
  include_once("includes/header.inc");
  include_once("includes/menu.inc");
?>

    <main>
      <article>
        <h3>VIDEO</h3>
        <hr />
        <h2>Video</h2>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/x7YKS1LFcKE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

      </article>
    </main>

    <?php include_once("includes/footer.inc"); ?>
  </body>

</html>

