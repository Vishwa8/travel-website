<?php 
	session_start();
?>
<html>
<head>
	<title>Packages</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="css/product-card.css">
</head>
<body>
	 <script language="javascript">	
	 	function learnmore(id) {		
			window.location.href = "view_package.php?id=" + id;
		}
	</script>

<?php require_once ("header.php"); ?>

<h1 class="text-center">Packages</h1>

<?php
	$status="";	
	if (isset($_POST['id']) && $_POST['id']!=""){
		if(isset($_SESSION['uid'])) {
			include('connection.php');		
			$id = $_POST['id'];
			$sql = "SELECT * FROM product WHERE id='$id'";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result);
			$name = $row['name'];
			$id = $row['id'];
			$price = $row['price'];
			$image = $row['image'];
			$cartArray = array(
				$id=>array(
				'name'=>$name,
				'id'=>$id,
				'price'=>$price,
				'quantity'=>1,
				'image'=>$image)
			);
			if(empty($_SESSION["shopping_cart"])) {
				$_SESSION["shopping_cart"] = $cartArray;
			}else{
				$array_keys = array_keys($_SESSION["shopping_cart"]);
				if(in_array($id,$array_keys)) {	
				} else {
				$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
				}
			}
		} else {
		?>
		  	<script language="javascript">        
		    	window.location.href = "login.php";
		  	</script>
		<?php
		}
	} 
?>  

<div class="row" style="">	
	<div style="background: #f1f1f1; padding-bottom: 10px; text-align: center;">
		<?php
			include("connection.php");
			$sql = "SELECT * FROM product";
			$result = mysqli_query($connection, $sql);

			while ($row=mysqli_fetch_array($result)) {			
				$id = $row['id'];
		?>
		<div class="column">
			<div class="pcard">
				  <img src="admin/images/packages/<?php echo $row['image'] ?>" alt="Package" style="width:100%; height:200px;">
				  <h3><?php echo $row['name'] ?></h3>
				  <p><?php echo substr($row['description'],0,40) ?></p>
				  <h3><?php echo $row['price'] ?>.00rs</h3>			
				  <p><button onclick="learnmore(<?php echo($row['id']) ?>)">Learn More</button></p>					  
				  <form method='post' action=''>
					<input type='hidden' name='id' value="<?php echo $row['id'] ?>" />
					<p><button type='submit' id="<?php echo($id) ?>">Add to Cart</button></p>					
				  </form> 
				</div>
		</div>
		<?php  
			}
		?>
	  </div>
	 </div>

	<div style="clear:both;"></div>

	<div class="message_box" style="margin:10px 0px;">
	<?php echo $status; ?>
	</div>
	
	<?php require_once ("footer.php"); ?> 
</body>
</html>