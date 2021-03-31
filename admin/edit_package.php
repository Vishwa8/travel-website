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
	<title>Edit Package</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>		
	<?php require_once ("header.php"); ?>

	<h1 class="text-center">Edit Package</h1>

	<?php
		$id=$_POST['id'];
		if (is_null($id) || empty($id))	{
			?>
				<script language="javascript">					
					window.location.href = "view_packages.php";
				</script>
				<?php
			} else {
		$sql = "SELECT * FROM product WHERE id = $id";
		include("connection.php");
		$result = mysqli_query($connection, $sql);
		$row=mysqli_fetch_array($result);
	}
	?>

	<form action="" method="post" enctype="multipart/form-data" style="padding-top: 20px; margin-top: 20px;">   
	  <div class="container">
	  	<input type="hidden" name="id" value="<?php echo $row['id']?>">
	    Package Name<input type="text" name="name" value="<?php echo $row["name"] ?>" required=""> <br><br>
		<!-- Image <br><br> <input type="file" name="image" required=""> <br><br>	         -->
		Description <input type="text" name="description" value="<?php echo $row["description"] ?>"> <br><br>
		Price <input type="text" name="price" value="<?php echo $row["price"] ?>"> <br><br>
		Stock <input type="text" name="stock" value="<?php echo $row["stock"] ?>"> <br><br>
	    <button type="submit" name="submit">Save package</button>
	  </div>
	  <h3 id="error" style="color: red; text-align: center;"></h3> 
	</form>

	<?php	
		if (isset($_POST['submit'])) {
			$id = $_POST['id'];
			$name = $_POST["name"];
			$description = $_POST["description"];
			$price = $_POST["price"];
			$stock = $_POST["stock"];
			include("connection.php");
			$sql = "UPDATE product SET name='$name', description='$description', price='$price', stock='$stock' WHERE id='$id'";    

			$result = mysqli_query($connection, $sql);
			if (!$result) {
				?>
					<script language="javascript">				
						document.getElementById("error").innerHTML = 'DB connection Error!';
					</script>
				<?php				
			} else {				
				?>
				<script language="javascript">					
					window.location.href = "view_packages.php";
				</script>
				<?php	
			}
			mysqli_close($connection);
		}
	?>

	<?php require_once ("footer.php"); ?>	
</body>
</html>