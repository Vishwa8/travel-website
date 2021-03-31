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
	<title>Order</title>
	<link rel='stylesheet' href='css/styles.css'/>
	<link rel='stylesheet' href='css/ord.css'/>
</head>
<body>    
  
<?php require_once ("header.php"); ?>

<h2 align="center">Order</h2>


<div class="center" style="width:300px; ">
<table class="center table">
	<tbody>
		<tr>
			<td>ORDER ID</td>
			<td>INVOICE ID</td>
			<td>PRODUCT IMAGE</td>
			<td>PRODUCT NAME</td>
			<td>QUANTITY</td>
		</tr>
<?php		
	include("connection.php");	
	$sql = "SELECT * FROM ordr";	
	include("connection.php");
	$result = mysqli_query($connection, $sql);
	if ((mysqli_num_rows($result))>0) {
	while($row=mysqli_fetch_array($result)){
		$id = $row['product_id'];
		$sql1 = "SELECT * FROM product WHERE id=$id";	
		$result1 = mysqli_query($connection, $sql1);
		$prow=mysqli_fetch_array($result1);
?>
		<tr>
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["invoice_id"]; ?></td>
			<td><img src="images/packages/<?php echo $prow['image']; ?>" width="50" height="40" /></td>
			<td><?php echo $prow["name"]; ?></td>
			<td><?php echo $row["quantity"]; ?></td>
		</tr>
<?php 
	}}
?>
	</tbody>
</table>
</div>
<?php require_once ("footer.php"); ?>
</body>
</html>


