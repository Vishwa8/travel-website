<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/ord.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>

  <style>
  	.container {
  		margin-top: 10px;
  	}
  	.monospaced { font-family: 'Ubuntu Mono', monospaced ; }
  	.footer {
		  padding: 20px;
		  text-align: center;
		  margin-top: 20px;
		  color: #333;
		  clear: both;
		  position: relative;
		  margin-top: 200px;
		}
  </style>
</head>
<body> 

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
  
<?php require_once ("header.php"); ?>

<h2 text-align="center">Package</h2>

<?php	
	$id=$_GET['id'];
	$sql = "SELECT * FROM product WHERE id = $id";
	include("connection.php");
	$result = mysqli_query($connection, $sql);
	$row=mysqli_fetch_array($result);
?>

<div class="container" id="product-section">
  <div class="row">
   <div class="col-md-6">
    <div class="col-md-6">
	 <img src="admin/images/packages/<?php echo $row['image'] ?>" alt="Package" style="width:500px; height:400px;" class="image-responsive" />
	</div>
   </div>
   <div class="col-md-6">
    <div class="row">
	  <div class="col-md-12">
	   <h1 style="text-align: center;"><?php echo $row['name']; ?></h1>
	 </div>
   </div>   
	<div class="row">
	 <div class="col-md-12">
	 	<p></p>
	  <p style="text-align: center;" class="description">
	  	<?php echo $row['description']; ?>
	  </p>
	 </div>
	</div>
	<div class="row">
	 <div class="col-md-12">
	  <?php if ($row['stock'] > 0) { echo "<h4 style='color: green; text-align: center;'>In Stock</h4>";} else {echo "<h4 style='color: red; text-align: center;'>Out Of Stock</h4>";} ?>
	 </div>
	</div>
	<div class="row">
	 <div class="col-md-12 bottom-rule">
	  <h2 style="text-align: center;" class="product-price" ><?php echo $row['price']; ?>.00rs.</h2>
	 </div>
	</div>
	  <form method='post' action=''>
		<input type='hidden' name='id' value="<?php echo $row['id'] ?>" />
		<button id="cobtn" style="display: block; width: 100%" type='submit' id="<?php echo($id) ?>">Add to Cart</button>		
	  </form> 
  </div><!-- end row -->
 </div><!-- end container -->


<div class="footer">
		<h4>©2020 Fine & Fair(Pvt) Ltd. All Rights Reserved.</h4>
</div>

</body>
</html>