<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Demonstrates CSS layout">
  <meta name="keywords" content="HTML5, CSS layout">
  <meta name="author" content="Group 2 | Trinh Quy Khang">
  <meta charset="utf-8">
  <title>CoffeeShop | About</title>
  <!-- References to external CSS files -->
  <link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
    $page = "aboutPage";
    include_once("includes/header.inc");
    include_once("includes/menu.inc");
?>
  <article class="about">
    <h3>HOME / ABOUT</h3>
    <hr>
    <h1>About Us</h1>
    <p>Our team is a group of 5 students from Swinburne University of Technology, majoring in Bachelor of Computer Science. We are currently in our 1st year of study. We are passionate about web development and we are excited to be able to apply our knowledge to this project. </p>
    
    <!-- information section -->
    <section class="about-information" id="enchancement-4">
      <h2>Personal Information</h2>
      <p>Please click on the images below to view the personal information of each member of our team.</p>
      <div class="about-selection">
        <label for="about-1"><img src="images/person-1.jpg" alt=""></label>
        <label for="about-2"><img src="images/person-2.jpg" alt=""></label>
        <label for="about-3"><img src="images/person-3.jpg" alt=""></label>
        <label for="about-4"><img src="images/person-4.jpg" alt=""></label>
        <label for="about-5"><img src="images/person-5.jpg" alt=""></label>
      </div>
      <input type="radio" name="about-radio" id="about-1" checked>
      <input type="radio" name="about-radio" id="about-2">
      <input type="radio" name="about-radio" id="about-3">
      <input type="radio" name="about-radio" id="about-4">
      <input type="radio" name="about-radio" id="about-5">
      <!-- Person 1 -->
      <div class="about-box p1">
        <div class="about-box-logo"><figure><img src="images/person-1.jpg" alt="Nguyen Chi Cuong"></figure></div>
        <div class="about-box-details">
          <dl>
            <dt>Name</dt>
            <dd>Nguyen Chi Cuong</dd>
            <dt>Student ID</dt>
            <dd>104222057 </dd>
            <dt>Course</dt>
            <dd>Bachelor of Computer Science</dd>
            <dt>Email</dt>
            <dd>104222057@student.swin.edu.au</dd>
            <dt>Hometown</dt>
            <dd>Nha Trang city, Khanh Hoa Province, Vietnam </dd>
            <dt>Hobbies</dt>
            <dd>Coding, algorithms, watching movies</dd>
            <dt>Favourite movie types</dt>
            <dd>Action, Sci-Fi, Romantic</dd>
          </dl>
        </div>
      </div>
      <!-- Person 2 -->
      <div class="about-box p2">
        <div class="about-box-logo"><figure><img src="images/person-2.jpg" alt="Trinh Quy Khang"></figure></div>
        <div class="about-box-details">
          <dl>
            <dt>Name</dt>
            <dd>Nguyen Quoc Thang</dd>
            <dt>Student ID</dt>
            <dd>104193360</dd>
            <dt>Course</dt>
            <dd>Bachelor of Computer Science</dd>
            <dt>Email</dt>
            <dd>104193360@student.swin.edu.au</dd>
            <dt>Hometown</dt>
            <dd>Nam Dinh city, Viet Nam</dd>
            <dt>Hobbies</dt>
            <dd>Playing soccer, studying</dd>
            <dt>Favourite movie types</dt>
            <dd>Romantic</dd>
          </dl>
        </div>
      </div>
      <!-- Person 3 -->
      <div class="about-box p3">
        <div class="about-box-logo"><figure><img src="images/person-3.jpg" alt="Truong Duc Sang"></figure></div>
        <div class="about-box-details">
          <dl>
            <dt>Name</dt>
            <dd>Truong Duc Sang</dd>
            <dt>Student ID</dt>
            <dd>104220420</dd>
            <dt>Course</dt>
            <dd>Bachelor of Computer Science</dd>
            <dt>Email</dt>
            <dd>104220420@student.swin.edu.au</dd>
            <dt>Hometown</dt>
            <dd>Ha Noi city, Viet Nam</dd>
            <dt>Hobbies</dt>
            <dd>Watch anime, play anime games</dd>
            <dt>Favourite movie types</dt>
            <dd>Anime</dd>
          </dl>
        </div>
      </div>
      <!-- Person 4 -->
      <div class="about-box p4">
        <div class="about-box-logo"><figure><img src="images/person-4.jpg" alt="Trinh Quy Khang"></figure></div>
        <div class="about-box-details">
          <dl>
            <dt>Name</dt>
            <dd>Trinh Quy Khang </dd>
            <dt>Student ID</dt>
            <dd>104212003 </dd>
            <dt>Course</dt>
            <dd>Bachelor of Computer Science</dd>
            <dt>Email</dt>
            <dd>104212003@student.swin.edu.au</dd>
            <dt>Hometown</dt>
            <dd>Nha Trang city, Khanh Hoa Province, Vietnam </dd>
            <dt>Hobbies</dt>
            <dd>Playing basketball, working out </dd>
            <dt>Favourite movie types</dt>
            <dd>Action</dd>
          </dl>
        </div>
      </div>
      <!-- Person 5 -->
      <div class="about-box p5">
        <div class="about-box-logo"><figure><img src="images/person-5.jpg" alt="Nguyen Tai Minh Huy"></figure></div>
        <div class="about-box-details">
          <dl>
            <dt>Name</dt>
            <dd>Nguyen Tai Minh Huy</dd>
            <dt>Student ID</dt>
            <dd>104220352 </dd>
            <dt>Course</dt>
            <dd>Bachelor of Computer Science</dd>
            <dt>Email</dt>
            <dd>104220352@student.swin.edu.au</dd>
            <dt>Hometown</dt>
            <dd>Ho Chi Minh city, Vietnam </dd>
            <dt>Hobbies</dt>
            <dd>Photoshop, making videos</dd>
            <dt>Favourite movie types</dt>
            <dd>Cartoon</dd>
          </dl>
        </div>
      </div>
    </section>

    <!-- timetable section -->
    <section class="about-timetable">
      <h2>Timetable at Swinburne</h2>
      <table class="about-table">
        <tr style="width:150px">
          <th></th>
          <th><p>Monday</p></th>
          <th><p>Tuesday</p></th>
          <th><p>Wednesday</p></th>
          <th><p>Thursday</p></th>
          <th><p>Friday</p></th>
          <th><p>Saturday</p></th>
          <th><p>Sunday</p></th>
        </tr>
        <tr>
          <th>MORNING <br>8.00 AM </th>
          <td>Self study</td>
          <td class="subject">COS200076<br>(Object Oriented Programing)</td>
          <td>Self study</td>
          <td class="subject">TNE100066<br>(Network & Switching)</td>
          <td>Self study</td>
          <td> Self study</td>
          <td> Self study</td>
        </tr>
        <tr>
          <td colspan="8" class="table-hr"></td>
        </tr>
        <tr>
          <th> AFTERNOON <br>1.00 PM</th>
          <td>Self study</td>
          <td>Self study</td>
          <td class="subject">COS10026<br>(Computing Technology Inquiry Project)</td>
          <td class="subject">TNE100066<br>(Network & Switching)</td>
          <td>Self study</td>
          <td>Self study</td>
          <td>Self study</td>
        </tr>
      </table>
    </section>
  </article>
<?php include_once("includes/footer.inc"); ?>
</body>
</html>