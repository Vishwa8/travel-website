<?php 
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>    
  
<?php require_once ("header.php"); ?>

<h2 align="center">Reset Password</h2>

<?php 

  if (isset($_POST['login'])) {

    $email = $_POST['uname'];
    $psw = $_POST['psw'];

    include("connection.php");

    $sql = "SELECT * FROM customer WHERE email='$email' AND password=$psw";        

    $result = mysqli_query($connection, $sql);

    if ((mysqli_num_rows($result))>0) {
      $_SESSION['username'] = $email;
      $_SESSION['password'] = $psw;
?>
      <script language="javascript">        
        window.location.href = "profile.php";
      </script>
<?php 
    } else {
      echo "Email or Password doesn't match";  
    }
    mysqli_close($connection);
  }

?>
<form action="" method="post">    
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="email" placeholder="Enter Email" name="uname" required>

    <label for="psw"><b>New Password</b></label>
    <input type="password" placeholder="Enter New Password" name="psw" required>

    <label for="cpsw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cpsw" >
        
    <button type="submit" name="rp">Reset Password</button>
  </div>
</form>

<?php require_once ("footer.php"); ?>

</body>
</html>