<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/product-card.css">
</head>
<body>
	
<script language="javascript">			  		
	function viewpackage(id) {		
		window.location.href = "view_destination.php?id=" + id;
	}
</script>

<?php require_once ("header.php"); ?>

<h1 class="text-center">Destinations</h1>


<div class="row" style="">
	    <div style="background: #f1f1f1; padding-bottom: 10px; text-align: center;">
		<?php  
			include("connection.php");
			$sql = "SELECT * FROM category";
			$result = mysqli_query($connection, $sql);

			while ($row=mysqli_fetch_array($result)) {
		?>
		<div class="column">
		<div class="pcard">
		  <img src="admin/images/<?php echo $row['image'] ?>" alt="Package" style="width:100%; height:200px;">
		  <h1><?php echo $row['name'] ?></h1>
		  <p><button onclick="viewpackage(<?php echo($row['id']) ?>)" id="<?php echo($id) ?>">View Package</button></p>
		</div>
		</div>
		<?php  
			}
		?>
	  </div>
	 </div>

<?php require_once ("footer.php"); ?> 
</body>
</html>