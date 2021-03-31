<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  
<?php require_once ("header.php"); ?>

<h2 align="center">Sign Up</h2>

<form action="" method="post">
  <div class="container">
    <label for="uname"><b>Name</b></label>
    <input type="text" placeholder="Enter Your Name" name="uname" required="">

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required="">

    <label for="tpno"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter Your Contact Number" name="tpno" required="">

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Your Address" name="address" required="">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required="">

    <label for="cpsw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cpsw" required="">
        
    <button type="submit" name="reg">Sign Up</button>
  </div>
  <h3 id="error" style="color: red; text-align: center;"></h3> 
</form>

<?php 

  if (isset($_POST['reg'])) {

    $name = $_POST['uname'];
    $email = $_POST['email'];
    $tpno = $_POST['tpno'];
    $address = $_POST['address'];
    $psw = $_POST['psw'];
    $cpsw = $_POST['cpsw'];

    include("connection.php");

    $sql = "SELECT * FROM customer WHERE email='$email'";        

    $result = mysqli_query($connection, $sql);

    if ((mysqli_num_rows($result))>0) {
      ?>
        <script language="javascript">
          document.getElementById("error").innerHTML = 'Email already exists!'; 
        </script>
      <?php
    } else {
      if ($psw != $cpsw) {
        ?>
          <script language="javascript">
            document.getElementById("error").innerHTML = "Passwords doesn't match!"; 
          </script>
        <?php
      } else {
        $sql = "INSERT INTO customer (name, email, password, tp_no, address) VALUES ('$name','$email','$psw','$tpno','$address')";
        $result = mysqli_query($connection, $sql);
        if (!$result) {
        ?>
          <script language="javascript">        
            document.getElementById("error").innerHTML = 'DB connection Error!';
          </script>
        <?php
        } else {
        ?>
          <script language="javascript">            
            window.location.href = "login.php";
          </script>
        <?php       
        }             
      }
    }
    mysqli_close($connection);

  }

?>

<?php require_once ("footer.php"); ?>

</body>
</html>