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
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/product-card.css">
</head>
<body>

<?php require_once ("header.php"); ?>

<h1 class="text-center">All Destinations</h1>

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
		  <img src="images/<?php echo $row['image'] ?>" alt="Package" style="width:100%; height:200px;">
		  <h1><?php echo $row['name'] ?></h1>
		  <form method="post" action="">
			<input type="hidden" name="id" value="<?php echo $row['id']?>">
			<input id="submit" type="submit" name="delete" value="Delete">		
		  </form> 

		  <form method="post" action="edit_destination.php">
			<input type="hidden" name="id" value="<?php echo $row['id']?>">
			<input id="submit" type="submit" name="edit" value="Edit">		
		  </form> <br>
		</div>
		</div>
		<?php  
			}
		?>		

	  </div>
	 </div>
	 <h3 id="error" style="color: red; text-align: center;"></h3>

	 <?php
		if (isset($_POST['delete'])) {
			$id=$_POST['id'];

			include("connection.php");

			$sql = "DELETE FROM category WHERE id='$id'";        

			$result = mysqli_query($connection, $sql);

			if (!$result) {
				?>
					<script language="javascript">				
						document.getElementById("error").innerHTML = "DB connection Error! or You can't delete a destination if it has package in it!";
					</script>
				<?php
			} else {
				?>
					<script language="javascript">
						window.location.href = "view_destination.php";
					</script>
				<?php
			}

			mysqli_close($connection);	
		}
	?>

<?php require_once ("footer.php"); ?> 
</body>
</html>