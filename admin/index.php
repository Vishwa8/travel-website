<?php 
	session_start();
	if (!isset($_SESSION['username'])) {
?>
      	<script language="javascript">        
        	window.location.href = "login.php";
      	</script>
<?php
	}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>    
  
<?php require_once ("header.php"); ?>

<?php 
	if (isset($_SESSION['name'])) {
		echo "<h1 align='center'>Welcome Admin ".$un = $_SESSION['name']."!</h1>";
?>	
	<a style="text-decoration: none; color: red; font-weight: bold;" href="logout.php">Logout</a>
<?php 
	} else {
?>
      	<script language="javascript">        
        	window.location.href = "login.php";
      	</script>
<?php
	}
?>

<?php require_once ("footer.php"); ?>

</body>
</html>