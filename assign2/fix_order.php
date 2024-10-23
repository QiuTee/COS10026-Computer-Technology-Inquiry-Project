<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Demonstrates CSS layout">
  <meta name="keywords" content="HTML5, CSS layout">
  <meta name="author" content="Group 2">
  <meta charset="utf-8">
  <title>CoffeeShop | Enhancements</title>
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

  if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:payment.php');		//redirect to payment.php if attempted to access directly
    exit;
  }

  $page = "enquirePage";
  include_once("includes/header.inc");
  include_once("includes/menu.inc");

  // Get the product names and quantities from the form
  //Print out error message
  session_start();
  $errMsg = $_SESSION["errMsg"];

  // Initialize variables to hold form input data and validation errors
  $errors = [];
  $firstName = "";
  $lastName = "";
  $email = "";
  $phone = "";
  $address = "";
  $suburb = "";
  $state = "";
  $postCode = "";

  if(isset($_SESSION["firstName"])) $firstName = $_SESSION["firstName"];
  if(isset($_SESSION["lastName"])) $lastName = $_SESSION["lastName"];
  if(isset($_SESSION["email"])) $email = $_SESSION["email"];
  if(isset($_SESSION["phone"])) $phone = $_SESSION["phone"];
  if(isset($_SESSION["address"])) $address = $_SESSION["address"];
  if(isset($_SESSION["suburb"])) $suburb = $_SESSION["suburb"];
  if(isset($_SESSION["state"])) $state = $_SESSION["state"];
  if(isset($_SESSION["postCode"])) $postCode = $_SESSION["postCode"];


?>
<article>
  <h3>HOME / FIX ORDER</h3>
  <hr>

<!--   display $errMsg -->
  <div class="errMsg">
    <?php echo $errMsg; ?>
  </div>
  <section>
    <div class="payment-form">
      <form action="process_order.php" method="post" novalidate="novalidate">
        <div class="form-container">
        <span>Fix Order Form</span>
            <br>
            <div class="information">
              <h3>Your Information</h3>
              <div class="input-field">
                <label for="firstName">First Name</label>
                <input id="firstName" type="text" name="firstName" placeholder="Your First Name" value="<?php echo $firstName ?>">
                <label for="lastName">Last Name</label>
                <input id="lastName" type="text" name="lastName" placeholder="Your Last Name" value="<?php echo $lastName ?>">
              </div>
              <div class="input-field">
                <label for="email">Email:</label>
                <input id="email" type="text" name="email" placeholder="Enter your e-mail address" value="<?php echo $email ?>">
                <label for="phone">Phone:</label>
                <input id="phone" type="tel" name="phone" placeholder="10-digit phone number" value="<?php echo $phone ?>">
              </div>
            </div>
            <br>
            <!--  -->
            <div class="address">
              <h3>Your Physical Address</h3>
              <div class="input-field">
                <label for="address">Street Address</label>
                <input id="address" type="text" name="address" placeholder="Your Street Address" value="<?php echo $address ?>">
                <label for="suburb">Suburb or Town</label>
                <input id="suburb" type="text" name="suburb" placeholder="Suburb/town" value="<?php echo $suburb ?>">
              </div>
              <div class="input-field">
                <label for="state">Select your State</label>
                <select id="state" name="state" required>
                  <option value="">Please select</option>
                  <option value="VIC" <?php if($state == 'VIC') echo 'selected'; ?>>VIC</option>
                  <option value="NSW" <?php if($state  == 'NSW') echo 'selected'; ?>>NSW</option>
                  <option value="QLD" <?php if($state  == 'QLD') echo 'selected'; ?>>QLD</option>
                  <option value="NT" <?php if($state  == 'NT') echo 'selected'; ?>>NT</option>
                  <option value="WA" <?php if($state == 'WA') echo 'selected'; ?>>WA</option>
                  <option value="SA" <?php if($state == 'SA') echo 'selected'; ?>>SA</option>
                  <option value="TAS" <?php if($state == 'TAS') echo 'selected'; ?>>TAS</option>
                  <option value="ACT" <?php if($state == 'ACT') echo 'selected'; ?>>ACT</option>
                </select>
                
                <label for="postCode">Postcode</label>
                <input id="postCode" type="text" name="postCode" placeholder="4-digits postcode" value="<?php echo $postCode ?>">
                </div>
            </div>
            <br>
            <!--  -->
            <div class="input-field">
              <h3>Preferred method of contact:</h3>
              <input type="radio" name="contact" id="contactEmail" value="email" <?php if(isset($_SESSION['contact']) && $_SESSION['contact'] == 'email') echo 'checked'; ?>>
              <label for="contactEmail">Email</label>
              <input type="radio" name="contact" id="contactPost" value="post" <?php if(isset($_SESSION['contact']) && $_SESSION['contact'] == 'post') echo 'checked'; ?>>
              <label for="contactPost">Phone call</label>
              <input type="radio" name="contact" id="contactTel" value="phone" <?php if(isset($_SESSION['contact']) && $_SESSION['contact'] == 'phone') echo 'checked'; ?>>
              <label for="contactTel">Text message</label>
            </div>
            <!--  -->
            <div class="input-field">
              <h3>Please choose your product:</h3>
              <!-- Loop for list of product checkbox (include quantity field) -->
              <?php
                foreach ($product_price as $product => $price) {
                    echo "
                        <div class='input-field'>
                          <div class = 'enquire-product'>
                            <div class='enquire-product-info'>
                              <div class='enquire-product-ileft'>
                                <img src='$product_img[$product]' alt='$product'>
                                <label for='$product'>$product</label>
                                <label class='price'>- $$price</label>
                              </div>
                              <div class='enquire-product-iright'>
                                <label for='$product-quantity'>Quantity</label>
                                <input type='number' name='products[$product][quantity]' id='$product-quantity' min='0' max='100' value='0'>
                              </div>
                            </div>
                            <div class='enquire-product-options'>
                              <div>
                                <label for='$product-size'>Size</label>
                                <select name='products[$product][size]' id='$product-size'>
                                  <option value='Small'>Small</option>
                                  <option value='Medium'>Medium</option>
                                  <option value='Large'>Large</option>
                                </select>
                              </div>
                              <div>
                                <label for='$product-topping'>Topping</label>
                                <select name='products[$product][topping]' id='$product-topping'>
                                  <option value=''>No</option>
                                  <option value='Caramel'>Caramel</option>
                                  <option value='Chocolate'>Chocolate</option>
                                  <option value='Mint'>Mint</option>
                                  <option value='Vanilla'>Vanilla</option>
                                </select>
                              </div>
                              <div>
                                <label for='$product-ice'>Ice</label>
                                <select name='products[$product][ice]' id='$product-ice'>
                                  <option value='Yes'>Yes</option>
                                  <option value='No'>No</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                    ";
                }
              ?>
            </div>
            <!--  -->
            <div class="input-field">
              <h3>Select product feature</h3>
              <input type="checkbox" name="features[]" id="feature-1" value="Feature 1" <?php if(isset($_SESSION['features']) && in_array('Feature 1', $_SESSION['features'])) echo 'checked'; ?>>
              <label for="feature-1">Feature 1</label>
              <input type="checkbox" name="features[]" id="feature-2" value="Feature 2" <?php if(isset($_SESSION['features']) && in_array('Feature 2', $_SESSION['features'])) echo 'checked'; ?>>
              <label for="feature-2">Feature 2</label>  
              <input type="checkbox" name="features[]" id="feature-3" value="Feature 3" <?php if(isset($_SESSION['features']) && in_array('Feature 3', $_SESSION['features'])) echo 'checked'; ?>>
              <label for="feature-3">Feature 3</label>
            </div>
            
            <!--  -->
            <div class="input-field">
              <h3 class="cmt">Comment</h3>             
              <textarea id="comment" name="comment" rows="6" cols="100" placeholder="Your comment (Optional)" value="<?php echo $comment ?>"></textarea>
            </div>

            <!--  -->
            <div class="card-information">
              <h3>Credit Card Information</h3>
              <div class="input-field">
                <label for="cardType">Credit Card Type:</label>
                <select id="cardType" name="cardType">
                  <option value="">Please select</option>
                  <option value="visa">Visa</option>
                  <option value="mastercard">Mastercard</option>
                  <option value="amex">American Express</option>
                </select><br>
              </div>
              <div class="input-field">
                  <label for="cardName">Name on Credit Card:</label>
                  <input type="text" id="cardName" name="cardName">
                  <label for="cardNumber">Credit Card Number:</label>
                  <input type="text" id="cardNumber" name="cardNumber">
              </div>
              <div class="input-field">
                  <label for="cardExpires">Expiry Date (mm/yy):</label>
                  <input type="text" id="cardExpires" name="cardExpires">
                  <label for="cardCVV">Card Verification Value (CVV):</label>
                  <input type="text" id="cardCVV" name="cardCVV">
              </div>
            </div>
          
          <div class="submit">
            <input type="submit" id="submit" value="Checkout">
          </div>
        </div>
      </form>
    </div>
  </section>
</article>
<?php include_once("includes/footer.inc"); ?>
</body>
</html>