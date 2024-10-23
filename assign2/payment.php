<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Demonstrates CSS layout">
  <meta name="keywords" content="HTML5, CSS layout">
  <meta name="author" content="Group 2">
  <title>CoffeeShop | Enquiry</title>
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet">
</head>
<body>
  <?php
      $page = "enquirePage";
      include_once("includes/header.inc");
      include_once("includes/menu.inc");
  ?>
  <article class="enquire">
    <h3>HOME / PAYMENT</h3>
    <hr>
    <section>
      <h2>Payment</h2>
      <p>Thank you for your order. Please fill in the form below to complete your order.</p>
      <div class="enquire-form">
        <!-- https://mercury.swin.edu.au/it000000/formtest.php -->
        <form action="process_order.php" method="post" novalidate="novalidate">
          <div class="form-container">
            <span>Payment Form</span>
            <br>
            <div class="information">
              <h3>Your Information</h3>
              <div class="input-field">
                <label for="firstName">First Name</label>
                <input id="firstName" type="text" name="firstName" pattern="[a-zA-Z]{0-25}" required placeholder="Your First Name">
                <label for="lastName">Last Name</label>
                <input id="lastName" type="text" name="lastName" pattern="[a-zA-Z]{0-25}" required placeholder="Your Last Name">
              </div>
              <div class="input-field">
                <label for="email">Email:</label>
                <input id="email" type="text" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter your e-mail address">
                <label for="phone">Phone:</label>
                <input id="phone" type="tel" name="phone" pattern="[0-9]{10}" required placeholder="10-digit phone number">
              </div>
            </div>
            <br>
            <!--  -->
            <div class="address">
              <h3>Your Physical Address</h3>
              <div class="input-field">
                <label for="address">Street Address</label>
                <input id="address" type="text" name="address" pattern="[a-zA-Z]{0-40}" required placeholder="Your Street Address">
                <label for="suburb">Suburb or Town</label>
                <input id="suburb" type="text" name="suburb" pattern="[a-zA-Z]{0-20}" required placeholder="Suburb/town">
              </div>
              <div class="input-field">
                <label for="state">Select your State</label>
                <select id="state" name="state" required>
                  <option value="">Please select</option>
                  <option value="VIC">VIC</option>
                  <option value="NSW">NSW</option>
                  <option value="QLD">QLD</option>
                  <option value="NT">NT</option>
                  <option value="WA">WA</option>
                  <option value="SA">SA</option>
                  <option value="TAS">TAS</option>
                  <option value="ACT">ACT</option>
                </select>                
                <label for="postCode">Postcode</label>
                <input id="postCode" type="text" name="postCode" pattern="[0-9]{4}" required placeholder="4-digits postcode">
                </div>
            </div>
            <br>
            <!--  -->
            <div class="input-field">
              <h3>Preferred method of contact:</h3>
              <input type="radio" name="contact" id="contactEmail" value="email" checked>
              <label for="contactEmail">Email</label>
              <input type="radio" name="contact" id="contactPost" value="post">
              <label for="contactPost">Phone call</label>
              <input type="radio" name="contact" id="contactTel" value="phone">
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
              <input type="checkbox" name="features[]" id="feature-1" value="Feature 1">
              <label for="feature-1">Feature 1</label><br>
              <input type="checkbox" name="features[]" id="feature-2" value="Feature 2">
              <label for="feature-2">Feature 2</label><br>
              <input type="checkbox" name="features[]" id="feature-3" value="Feature 3">
              <label for="feature-3">Feature 3</label>
            </div>
            
            <!--  -->
            <div class="input-field">
              <h3 class="cmt">Comment</h3>             
              <textarea id="comment" name="comment" rows="6" cols="100" placeholder="Your comment (Optional)"></textarea>
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
              <input type="submit" value="Check Out">
            </div>
          </div>
        </form>
      </div>
    </section>
  </article>
  <?php include_once("includes/footer.inc"); ?>
</body>
</html>