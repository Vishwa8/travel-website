<html>
<head>
<style>
main{
padding: 0;
}
header{
position: sticky;
top:0;
text-align: center;
}

content > div {
height: 50px;
}

.header {
  padding: 30px;
  text-align: center;
  background: white;
}

.header h1 {
  font-size: 50px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-weight: bold;
}

/* topnav - Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}

</style>
</head>

<body>

<?php require_once ("header-image.php"); ?>
<header>
<div class="topnav">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="destination.php">Destinations</a>
  <a href="package.php">Packages</a>
  <a href="contact.php">Contact</a>    
  <a href='profile.php' style='float:right'>Profile</a>
  <a href="cart.php" style="float:right">Cart</a>  
</div>
</header>

</body>

</html>