<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>    
  
<?php require_once ("header.php"); ?>

<h2 align="center">Login</h2>

<form action="" method="post">     
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="email" placeholder="Enter Email" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="login">Login</button>
  </div>

  <div class="container" style="overflow: hidden; background-color: #f1f1f1">
    <a href="signup.php">Create account?</a>
    <a style="float:right" href="password_reset.php">Forgot password?</a>
  </div>
</form>

<h3 id="error" style="color: red; text-align: center;"></h3>

<?php 
  session_start();
  if (isset($_POST['login'])) {

    $email = $_POST['uname'];
    $psw = $_POST['psw'];

    include("connection.php");

    $sql = "SELECT * FROM customer WHERE email='$email' AND password=$psw";        

    $result = mysqli_query($connection, $sql);

    $row=mysqli_fetch_array($result);

    if ((mysqli_num_rows($result))>0) {
      $_SESSION['uid'] = $row['id'];
      $_SESSION['username'] = $email;
      $_SESSION['password'] = $psw;
      ?>
            <script language="javascript">        
              window.location.href = "profile.php";
            </script>
      <?php 
    } else {
        ?>
          <script language="javascript">
            document.getElementById("error").innerHTML = "Invalid Username or Password!"; 
          </script>
        <?php
    }
    if(isset($_SESSION["username"])) {
      ?>
            <script language="javascript">        
              window.location.href = "profile.php";
            </script>
      <?php 
    }
    mysqli_close($connection);
  }

?>

<?php require_once ("footer.php"); ?>

</body>
</html>