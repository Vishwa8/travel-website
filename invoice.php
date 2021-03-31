<?php 
	session_start();
	unset($_SESSION["shopping_cart"]);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel='stylesheet' href='css/styles.css'/>
	<link rel='stylesheet' href='css/ord.css'/>
</head>
<body>    
  
<?php require_once ("header.php"); ?>

<h2 align="center">Invoice</h2>

<?php		
	include("connection.php");
	$id=$_SESSION['uid'];	
	$sql = "SELECT * FROM customer WHERE id = $id";
	include("connection.php");
	$result = mysqli_query($connection, $sql);
	$row=mysqli_fetch_array($result);
	$name = $row['name'];
?>
<div class="center" style="width:300px; ">
<table class="center table">
	<tbody>
		<tr>
			<td>CUSTOMER NAME</td>
			<td>TOTAL PRICE</td>
		</tr>
		<tr>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $_SESSION["totalprice"].".00"; ?></td>
		</tr>
	</tbody>
</table>
<script language="javascript">  
	function orderdone() {      
    	window.location.href = "index.php";
	}
</script>
<p><button id="cobtn" onclick="orderdone()" id="<?php echo($id) ?>">Order successfull!</button></p>
</div>
<?php require_once ("footer.php"); ?>
</body>
</html>