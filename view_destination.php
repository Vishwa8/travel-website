<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/product-card.css">
</head>
<body>    
	<script language="javascript">			  		
		  		function learnmore(id) {		
					window.location.href = "view_package.php?id=" + id;
				}
			  	function addtocart(id) {		
					<?php  
						session_start();
							$un = '';
							if (isset($_SESSION['username'])) { 
								$un = $_SESSION['username'];
							}
							if ($un == '') {
							?> 
								window.location.href = "login.php";
							<?php					
							} else {
							?> 
								window.location.href = "cart.php?id=" + id;
							<?php	
							}
						?>
					}
			</script>
  
<?php require_once ("header.php"); ?>

<h2 align="center">Destination</h2>

<div class="row" style="">
<div style="background: #f1f1f1; padding-bottom: 10px; text-align: center;">
<?php	
	$id=$_GET['id'];
	$sql = "SELECT * FROM product WHERE categoryId = '$id'";
	include("connection.php");
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
	  <p><button onclick="learnmore(<?php echo($row['id']) ?>)" id="<?php echo($id) ?>">Learn More</button></p>		  
		  
	  <p><button onclick="addtocart(<?php echo($row['id']) ?>)" id="<?php echo($id) ?>">Add to Cart</button></p>	

	</div>
</div>
	<?php  
		}
	?>
</div>
</div>

</body>
</html>