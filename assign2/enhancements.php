<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Demonstrates CSS layout">
  <meta name="keywords" content="HTML5, CSS layout">
  <meta name="author" content="Nguyen Tai Minh Huy">
  <meta charset="utf-8">
  <title>CoffeeShop | Enhancements</title>
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
    $page = "enhancements1Page";
    include_once("includes/header.inc");
    include_once("includes/menu.inc");
?>
  <article class="enhancements">
    <h3>HOME / ENCHANCEMENTS</h3>
    <hr>
    <section>
      <div class="enhancements-container">
        <h2>Enhancements List: (Part 1):</h2>
        <ul>
          <li>Auto Slider with 3 images <a href="index.php#enchancement-1">[View here]</a> </li>
          <li>Clickable Slider with 5 images <a href="index.php#enchancement-2">[View here]</a></li>
          <li>Animated text <a href="index.php#enchancement-3">[View here]</a></li>
          <li>Changing contents based on Image click <a href="about.php#enchancement-4">[View here]</a></li>
        </ul>
        <h2>Enhancements List: (Part 2):</h2>
        <ul>
          <li>Login and logout menu for manager (username: admin, password: password) <a href="login.php">[View here]</a></li>
            <ul>
              <li>Description: The enchantment restrict the access of manager page with a secured login - logout system</li>
              <li>Implementation: Using Login.php and Logout.php to manage the login/logout status of the manager, and use the SQL server to save encrypted password of manager</li>
            </ul>
          <li>Advanced Manager Report <a href="manager.php#report-search">[View here]</a></li>
          <ol>
            <li>Sale Report</li>
            <li>Highest Bills</li>
            <li>Revenue Report</li>
            <li>Status Report</li>
          </ol>
          <ul>
            <li>Description: The enchantment provide the manager with detailed business reports such as sale, highest bills, revenue, and status reports.</li>
            <li>Implementation: Using PHP to analize the data and SQL to fetch the data from server. The php code will perform operations and calculate needed value before display</li>
          </ul>
          <li>Advanced Sort Types <a href="manager.php#advanced-search">[View here]</a></li>
          <ol>
            <li>Sort By Numberic Values</li>
            <li>Sort Type: Ascending and Descending</li>
            <li>Date From To</li>
            <li>Price From To</li>
          </ol>
          <ul>
            <li>Description: Allows manager to sort the fetched data based on various criteria, and sort order</li>
            <li>Implementation: Using a form to take input from fields. Using SQL to fetch the data, and use PHP to apply the criteria on the data fetched, sort everything before display the table</li>
          </ul>
        </ul>
      </div>
    </section>
  </article>
<?php include_once("includes/footer.inc"); ?>
</body>
</html>
