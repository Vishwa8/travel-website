<?php
session_start();
$status="";
if(isset($_SESSION["uid"])) {
	$uid = $_SESSION["uid"];
} else {
?>
  	<script language="javascript">        
    	window.location.href = "login.php";
  	</script>
<?php
}
if (isset($_POST['remove'])){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["id"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['id'] === $_POST["id"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
	<title>Cart</title>
    <link rel="stylesheet" href="css/ord.css">
</head>
<body>

<script language="javascript">
  	function confirmorder() {
		<?php 
		  	include("connection.php");
			$id=$_SESSION['uid'];
			$date = date('Y-m-d H:i:s');
			$totalprice = $_SESSION['totalprice'];
			$sql = "INSERT INTO `invoice`(`customer_id`, `total`, `date`) VALUES ('$id','$totalprice','$date')";
		    $result = mysqli_query($connection, $sql);
		    $new_invoice = mysqli_insert_id($connection);
		    foreach ($_SESSION['shopping_cart'] as $key => $product) {
				$id = $product['id'];
				$quantity = $product['quantity'];	
			    $order1 = "INSERT INTO ordr (invoice_id, product_id, quantity) VALUES ($new_invoice, $id, $quantity)";
				mysqli_query($connection, $order1);
			}
		?>		
		window.location.href = "invoice.php";
	}
</script> 

<?php require_once ("header.php"); ?>
<div style="width:700px; margin:50 auto;">

<h2>Cart</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="images/cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src="admin/images/packages/<?php echo $product['image']; ?>" width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action='cart.php'>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<button id="btn" type='submit' name='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo $product["price"].".00Rs"; ?></td>
<td><?php echo $product["price"]*$product["quantity"].".00Rs"; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo $total_price.".00Rs"; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
  $_SESSION["totalprice"] = $total_price;
}else{
	echo "<h3>Your cart is empty!</h3>";
	}	
?>

<p><button id="cobtn" onclick="confirmorder()" id="<?php echo($id) ?>">Confirm Order!</button></p>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</div>

<?php require_once ("footer.php"); ?>
</body>
</html>