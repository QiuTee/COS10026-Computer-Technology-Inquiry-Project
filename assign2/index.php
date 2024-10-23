<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Demonstrates CSS layout">
    <meta name="keywords" content="HTML5, CSS layout">
    <meta name="author" content="Group 2 | Nguyen Chi Cuong">
    <title>CoffeeShop | Home</title>
    <!-- References to external CSS files -->
    <link href="styles/style.css" rel="stylesheet">
  </head>
  <body>
    <?php
        $page = "indexPage";
        include_once("includes/header.inc");
        include_once("includes/menu.inc");
    ?>
    <main>
      <!-- Banner -->
      <div class="banners" id="enchancement-1">
        <div class="slider">
					<div class="slides">
						<img src="images/landing-1.jpg" alt="banner1 image">	
						<img src="images/landing-2.jpg" alt="banner2 image">	
						<img src="images/landing-3.jpg" alt="banner3 image">	
					</div>
        </div>
      </div>
      <article class="homepage">
        <!-- About section -->
        <section class="about-section">
          <a href="https://youtu.be/x7YKS1LFcKE" target="_blank"> &gt;&gt; YOUTUBE VIDEO FOR ASSIGNMENT 02&lt;&lt; </a>
          <h1 class="heading">WHY CHOOSE US</h1>
          <div class="about-item">
            <img src="images/about-1.jpg" alt="">
            <div class="about-info">
              <h2>Unique coffee blends</h2>
                <p>We serve the most unique and delicious blends of coffee sourced from the best growers around the world. Our expertly roasted beans bring out the best flavor and aroma, with options ranging from strong espresso to frothy lattes.</p>
                <button class="section-bnt">READ MORE</button>
            </div>
          </div>
          <div class="about-item">
            <img src="images/about-2.jpg" alt="">
            <div class="about-info">
              <h2>Cozy atmosphere</h2>
                <p>Our coffee shop offers a cozy and comfortable atmosphere, making it the perfect place to relax and unwind while enjoying a cup of coffee.Our friendly staff is dedicated to providing excellent customer service, making sure you have a memorable coffee shop experience every time you visit us.</p>
                <button class="section-bnt">READ MORE</button>
            </div>
          </div>
        </section>
  
        <!-- Space section -->
        <section class="space" id="enchancement-2">
            <div class="space-left">
              <h1>OUR LOCATION</h1>
              <p>A cozy, welcoming space where you can enjoy a moment of peace and tranquility over a delicious cup of coffee. Our friendly baristas are always on hand to create your perfect cup using only the finest ingredients. Come join us and escape the hustle and bustle of everyday life.</p>
              <p>Image reference: <a href="https://thecoffeehouse.com">thecoffeehouse.com</a></p>
              <button class="section-bnt">READ MORE</button>
            </div>
            <div class="space-right">
              <div class="slider">
                <input type="radio" name="r" id="r1" checked="">
                <input type="radio" name="r" id="r2">
                <input type="radio" name="r" id="r3">
                <input type="radio" name="r" id="r4">
                <input type="radio" name="r" id="r5">
                <div class="slides">
                  <img src="images/space-1.jpg" alt="">
                  <img src="images/space-2.jpg" alt="">
                  <img src="images/space-3.jpg" alt="">
                  <img src="images/space-4.jpg" alt="">
                  <img src="images/space-5.jpg" alt="">
                </div>
              </div>
              <div class="slide-buttons">
                <label for="r1" class="bar"></label>
                <label for="r2" class="bar"></label>
                <label for="r3" class="bar"></label>
                <label for="r4" class="bar"></label>
                <label for="r5" class="bar"></label>
              </div>
            </div>
        </section>
  
        <!-- Categories section -->
        <section class="category" id="enchancement-3">
          <h1 class="heading">SELECT YOUR FAVOURITE DRINK</h1>
          <div class="category-wrapper">
            <div class="category-item">
                <img src="images/coffee-nobg.png" alt="">
                <div class="category-info">
                  <h2>COFFEE</h2>
                  <form action="product.php#coffee">
                    <button>ORDER NOW</button>
                  </form>
                </div>
            </div>
            <div class="category-item">
                <img src="images/milk-tea-nobg.png" alt="">
                <div class="category-info">
                  <h2>MILK TEA</h2>
                  <form action="product.php#milk-tea">
                    <button>ORDER NOW</button>
                  </form>
                </div>
            </div>
            <div class="category-item">
                <img src="images/juice-tea-nobg.png" alt="">
                <div class="category-info">
                  <h2>JUICE TEA</h2>
                  <form action="product.php#juice-tea">
                    <button>ORDER NOW</button>
                  </form>
                </div>
            </div>
          </div>
        </section>
  
        <!-- Newletters -->
        <section class="newletters">
          <div class="newletters-title">
            <h1>NEWSLETTER</h1>
            <p>Get timely updates from your favorite products.</p>
          </div>
          <div class="newletters-input">
            <input type="text" placeholder="Your email">
              <button>SEND</button>
          </div>
        </section>
      </article>
    </main>
    <?php include_once("includes/footer.inc"); ?>
  </body>
</html>