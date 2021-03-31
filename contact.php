<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php require_once ("header.php"); ?>

<div class="row">
  <div class="column-contact">
    <h1 class="text-center">CONTACT FORM</h1>
    <div class="container">
      <form action="/action_page.php">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">

        <label for="lname">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email..">

        <label for="country">Subject</label>
        <input type="text" id="sub" name="sub" placeholder="Subject..">

        <label for="subject">Inquiry</label>
        <textarea id="inq" name="inq" placeholder="Write your Inquiry.." style="height:200px"></textarea>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
  <div class="column-contact">
    <div class="card">
    <h1 class="text-center">CONTACT INFO</h1><br>
    <h3>Fine & Fair(Pvt) Ltd provides 24/7 support for all its products. </h3>
    <h3>Feel free to contact us! Please fill out our form, and we’ll get in touch shortly. If you have any questions regarding our services, ask us to help you on a that.</h3>
    <h3>Fine & Fair(Pvt) Ltd.</h3>
    <h3>57/8, Menning Mawatha,</h3>
    <h3>Mt Lavinia, Colombo.</h3>
    <h3>Freephone:+94-11-8888888</h3>
    <h3>Telephone:+94-11-6767676</h3>
    <h3>FAX:+94-11-5435436</h3>
    <h3>E-mail: fineandfair@finefair.com</h3>
  </div>
  </div>
</div>

<?php require_once ("footer.php"); ?> 
</body>
</html>
