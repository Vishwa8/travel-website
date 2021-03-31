<?php 
	session_start();
	unset($_SESSION["uid"]);
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	unset($_SESSION["shopping_cart"]);
?>
<script language="javascript">        
	window.location.href = "login.php";
</script>