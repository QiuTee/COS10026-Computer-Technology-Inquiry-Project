<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Demonstrates CSS layout" />
    <meta name="keywords" content="HTML5, CSS layout" />
    <meta name="author" content="Nguyen Chi Cuong" />
    <meta charset="utf-8" />
    <title>CoffeeShop | Receipt</title>
    <!-- References to external CSS files -->
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
<?php
  $page = "receiptPage";
  include_once("includes/header.inc");
  include_once("includes/menu.inc");

  if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:index.php');  //redirect to index.php if attempted to access directly
    exit;
  }
?>

    <main>
      <article>
        <h3>HOME / RECEIPT</h3>
        <hr />
        <h2>Receipt</h2>
        <p>
          Thank you for your order. Your order has been received and is being
          processed. You will receive an email confirmation shortly.
        </p>

        <?php
          session_start(); // Start the session

          $product_display = "";
          foreach ($_SESSION["products"] as $product => $pdata) {
            if ($pdata["quantity"] > 0) {
                $product_display .=
                    $pdata["quantity"] .
                    " x " .
                    $product .
                    " (" .
                    (empty($pdata["topping"])
                        ? "No Topping"
                        : $pdata["topping"]) .
                    ", " .
                    (empty($pdata["size"])
                        ? "Small"
                        : $pdata["size"]) .
                    ", " .
                    (empty($pdata["ice"])
                        ? "No Ice"
                        : (isset($pdata["ice"]) &&
                        $pdata["ice"] == "No"
                            ? "No Ice"
                            : "Ice")) .
                    ")<br>";
            }
        }

          echo "<table class='receipt-table'>";
          echo "<tr><th><strong>First Name:</strong></th><td>" . $_SESSION["firstName"] . "</td></tr>";
          echo "<tr><th><strong>Last Name:</strong></th><td>" . $_SESSION["lastName"] . "</td></tr>";
          echo "<tr><th><strong>Email:</strong></th><td>" . $_SESSION["email"] . "</td></tr>";
          echo "<tr><th><strong>Phone:</strong></th><td>" . $_SESSION["phone"] . "</td></tr>";
          echo "<tr><th><strong>Preferred Contact:</strong></th><td>" . $_SESSION["contact"] . "</td></tr>";
          echo "<tr><th><strong>Selected Feature:</strong></th><td>" . substr($_SESSION["features"], 1, -1) . "</td></tr>";
          echo "<tr><th><strong>Address:</strong></th><td>" . $_SESSION["address"] . "</td></tr>";
          echo "<tr><th><strong>Suburb:</strong></th><td>" . $_SESSION["suburb"] . "</td></tr>";
          echo "<tr><th><strong>State:</strong></th><td>" . $_SESSION["state"] . "</td></tr>";
          echo "<tr><th><strong>Postcode:</strong></th><td>" . $_SESSION["postCode"] . "</td></tr>";
          echo "<tr><th><strong>Purchases:</strong></th><td>" . $product_display . "</td></tr>";
          echo "<tr><th><strong>Comment:</strong></th><td>" . $_SESSION["comment"] . "</td></tr>";
          echo "<tr><th><strong>Card Type:</strong></th><td>" . $_SESSION["cardType"] . "</td></tr>";
          echo "<tr><th><strong>Card Number:</strong></th><td>" . $_SESSION["cardNumber"] . "</td></tr>";
          echo "<tr><th><strong>Card Name:</strong></th><td>" . $_SESSION["cardName"] . "</td></tr>";
          echo "<tr><th><strong>Card Expiry:</strong></th><td>" . $_SESSION["cardExpiry"] . "</td></tr>";
          echo "<tr><th><strong>Card CVV:</strong></th><td>***</td></tr>"; // Mask the CVV for security reasons
          echo "</table>";
        ?>

      </article>
    </main>

    <?php include_once("includes/footer.inc"); ?>
  </body>

</html>

