<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Demonstrates CSS layout">
  <meta name="keywords" content="HTML5, CSS layout">
  <meta name="author" content="Group 2 | Nguyen Quoc Thang">
  <title>CoffeeShop | Product</title>
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet">
</head>
<body>
  <?php
      $page = "productsPage";
      include_once("includes/header.inc");
      include_once("includes/menu.inc");
  ?>
  <main>
    <article class="product-container">
      <h3>HOME / PRODUCTS</h3>
      <hr>
      <h2>Product Range</h2>
      <p>Our coffee is made from the best Arabica beans, which are carefully selected and roasted to bring out the best flavor. We also offer a wide range of drinks and snacks to satisfy your cravings.</p>
      <aside>
        <!-- <h1 class="logo">CoffeeShop.</h1> -->
        <div class="discount">
          <img src="images/cup.png" alt="">
          <p id="dis">p.m 2:00-5:00 <mark>free</mark> Up Size</p>
        </div>
        <div class="refill-product">
          <p>When buying one of the following 3 drinks:</p>
          <ol>
            <li>Black Pearl Milk Tea</li>
            <li>Peach Orange Lemongrass Tea</li>
            <li>Americano</li>
          </ol>
        </div>
        <div class="toppings">
          <p>Discount for all toppings: </p>
          <table>
            <tr style="width:200px">
              <th>Toppings</th>
              <th><p>Golden Bubble</p></th>
              <th><p>White pearl</p></th>
              <th><p>Milk foam</p></th>
              <th><p>Grass Jelly</p></th>
            </tr>
            <tr style="text-align: center;">
              <th>Price</th>
              <td>$0.25</td>
              <td>$0.5</td>
              <td>$0.75</td>
              <td>$1</td>
            </tr>
          </table>
        </div>
      </aside>
      <div class="products">
        <!-- Product 1 -->
        <section class="product" id="coffee">
          <img src="images/espresso.jpg" alt="">
          <div class="product-details">
            <h3 class="product-title">Epresso</h3>
            <p class="product-price">$2.49</p>
            <p>An original cup of Espresso begins with quality Arabica beans, mixed with a balanced proportion of Robusta beans, giving a caramel sweetness, mild sourness and consistency.</p>
            <div class="product-options">
              <div class="option-item">
                <label for="size1">Size</label>
                <select id="size1" name="size1" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Small">Small</option>
                  <option value="Me4dium">Medium</option>
                  <option value="Large">Large</option>
                </select>
              </div>
              <div class="option-item2">
                <label for="topping1">Topping</label>
                <select id="topping1" name="topping1" required>
                  <option value="" selected>Pick an option</option>
                  <option value="topping 1">Topping 1</option>
                  <option value="topping 2">Topping 2</option>
                  <option value="topping 3">Topping 3</option>
                </select>
              </div>
              <div class="option-item3">
                <label for="ice1">Ice</label>
                <select id="ice1" name="ice1" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
        </section>
        
        <!-- Product 2 -->
        <section class="product">
          <img src="images/cappuccino.jpg" alt="">
          <div class="product-details">
            <h3 class="product-title">Cappuccino</h3>
            <p class="product-price">$2.49</p>
            <p>Capuchino is a drink that blends the aroma of milk, the fat of cream foam and the rich taste of Espresso coffee. All create a special flavor, a little gentle, quiet and delicate.</p>
            <div class="product-options">
              <div class="option-item">
                <label for="size2">Size</label>
                <select id="size2" name="size2" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Small">Small</option>
                  <option value="Me4dium">Medium</option>
                  <option value="Large">Large</option>
                </select>
              </div>
              <div class="option-item2">
                <label for="topping2">Topping</label>
                <select id="topping2" name="topping2" required>
                  <option value="" selected>Pick an option</option>
                  <option value="topping 1">Topping 1</option>
                  <option value="topping 2">Topping 2</option>
                  <option value="topping 3">Topping 3</option>
                </select>
              </div>
              <div class="option-item3">
                <label for="ice2">Ice</label>
                <select id="ice2" name="ice2" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
        </section>

        <!-- Product 3 -->
        <section class="product">
          <img src="images/latte.jpg" alt="">
          <div class="product-details">
            <h3 class="product-title">Latte</h3>
            <p class="product-price">$2.59</p>
            <p>A delicate combination between the bitter taste of pure Espresso coffee mixed with the sweet taste of hot milk, topped with a thin layer of light cream to create a perfect cup of coffee in terms of taste and look.</p>
            <div class="product-options">
              <div class="option-item">
                <label for="size3">Size</label>
                <select id="size3" name="size3" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Small">Small</option>
                  <option value="Me4dium">Medium</option>
                  <option value="Large">Large</option>
                </select>
              </div>
              <div class="option-item2">
                <label for="topping3">Topping</label>
                <select id="topping3" name="topping3" required>
                  <option value="" selected>Pick an option</option>
                  <option value="topping 1">Topping 1</option>
                  <option value="topping 2">Topping 2</option>
                  <option value="topping 3">Topping 3</option>
                </select>
              </div>
              <div class="option-item3">
                <label for="ice3">Ice</label>
                <select id="ice3" name="ice3" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
        </section>
        <!-- Product 4 -->
        <section class="product" id="milk-tea">
          <img src="images/milk-tea.jpg" alt="">
          <div class="product-details">
            <h3 class="product-title">Black Pearl Milk Tea</h3>
            <p class="product-price">$2.59</p>
            <p>Add a little sweetness to the new day with whole-leaf black tea, fragrant milk in perfect proportions, and crunchy white pearls available for you to enjoy every sip of sweet and delicious milk tea.</p>
            <div class="product-options">
              <div class="option-item">
                <label for="size4">Size</label>
                <select id="size4" name="size4" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Small">Small</option>
                  <option value="Me4dium">Medium</option>
                  <option value="Large">Large</option>
                </select>
              </div>
              <div class="option-item2">
                <label for="topping4">Topping</label>
                <select id="topping4" name="topping4" required>
                  <option value="" selected>Pick an option</option>
                  <option value="topping 1">Topping 1</option>
                  <option value="topping 2">Topping 2</option>
                  <option value="topping 3">Topping 3</option>
                </select>
              </div>
              <div class="option-item3">
                <label for="ice4">Ice</label>
                <select id="ice4" name="ice4" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
        </section>
        <!-- Product 5 -->
        <section class="product" id="juice-tea">
          <img src="images/juice-tea.png" alt="">
          <div class="product-details">
            <h3 class="product-title">Peach Orange Lemongrass Tea</h3>
            <p class="product-price">$2.59</p>
            <p>The sweet taste of peaches, the mild sourness of the whole yellow orange, the acrid taste of the black tea, which has been brewed for 4 hours each, and the characteristic passionate aroma of lemongrass are the highlights that make up the appeal of this drink.</p>
            <div class="product-options">
              <div class="option-item">
                <label for="size5">Size</label>
                <select id="size5" name="size5" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Small">Small</option>
                  <option value="Medium">Medium</option>
                  <option value="Large">Large</option>
                </select>
              </div>
              <div class="option-item2">
                <label for="topping5">Topping</label>
                <select id="topping5" name="topping5" required>
                  <option value="" selected>Pick an option</option>
                  <option value="topping 1">Topping 1</option>
                  <option value="topping 2">Topping 2</option>
                  <option value="topping 3">Topping 3</option>
                </select>
              </div>
              <div class="option-item3">
                <label for="ice5">Ice</label>
                <select id="ice5" name="ice5" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
        </section>
        <!-- Product 6 -->
        <section class="product">
          <img src="images/americano.jpg" alt="">
          <div class="product-details">
            <h3 class="product-title">Americano</h3>
            <p class="product-price">$2.59</p>
            <p>Americano is prepared by adding water in a certain proportion to a cup of Espresso coffee, thereby bringing a gentle taste and keeping the typical coffee aroma.</p>
            <div class="product-options">
              <div class="option-item">
                <label for="size6">Size</label>
                <select id="size6" name="size6" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Small">Small</option>
                  <option value="Medium">Medium</option>
                  <option value="Large">Large</option>
                </select>
              </div>
              <div class="option-item2">
                <label for="topping6">Topping</label>
                <select id="topping6" name="topping6" required>
                  <option value="" selected>Pick an option</option>
                  <option value="topping 1">Topping 1</option>
                  <option value="topping 2">Topping 2</option>
                  <option value="topping 3">Topping 3</option>
                </select>
              </div>
              <div class="option-item3">
                <label for="ice6">Ice</label>
                <select id="ice6" name="ice6" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
        </section>
        <!-- Product 7 -->
        <section class="product">
          <img src="images/roasted-coffee.jpg" alt="">
          <div class="product-details">
            <h3 class="product-title">Original Roasted Coffee 250g</h3>
            <p class="product-price">$2.59</p>
            <p>Original Coffee offers a great experience of drinking coffee at home with a rich traditional flavor that appeals to young coffee connoisseurs.</p>
            <ul>
              <li>Robusta coffee is Dak Lak</li>
              <li>Roasted coffee</li>
              <li>250g</li>
            </ul>
            <div class="product-options">
              <div class="option-item">
                <label for="size7">Size</label>
                <select id="size7" name="size7" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Small">Small</option>
                  <option value="Me4dium">Medium</option>
                  <option value="Large">Large</option>
                </select>
              </div>
              <div class="option-item2">
                <label for="topping7">Topping</label>
                <select id="topping7" name="topping7" required>
                  <option value="" selected>Pick an option</option>
                  <option value="topping 1">Topping 1</option>
                  <option value="topping 2">Topping 2</option>
                  <option value="topping 3">Topping 3</option>
                </select>
              </div>
              <div class="option-item3">
                <label for="ice7">Ice</label>
                <select id="ice7" name="ice7" required>
                  <option value="" selected>Pick an option</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>
          </div>
        </section>
      </div>
      <p>Products reference: <a href="https://thecoffeehouse.com">thecoffeehouse.com</a></p>
    </article>
  </main>
  <?php include_once("includes/footer.inc"); ?>
</body>
</html>