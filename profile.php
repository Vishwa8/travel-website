<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>    
  
<?php require_once ("header.php"); ?>

<h2 align="center">Profile</h2>

<?php 
	session_start();
	if (isset($_SESSION['username'])) {
		echo "<h4 align='center'>Welcome ".$un = $_SESSION['username']."!</h4>";
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