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
	<title>Package</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>		
	<?php require_once ("header.php"); ?>

	<h1 class="text-center">Add New Package</h1>

	<form action="" method="post" enctype="multipart/form-data" style="padding-top: 20px; margin-top: 20px;">   
	  <div class="container">
	    Product Name<input type="text" name="name" required=""> <br><br>
	    Destination 
	    <select name="category">
			<?php  
				include("connection.php");
				$sql = "SELECT * FROM category";
				$result = mysqli_query($connection, $sql);

				while ($row=mysqli_fetch_array($result)) {	
			?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
			<?php  
				}
			?>
		</select> <br><br>
		description <input type="text" name="description" required=""> <br><br>
		Price <input type="text" name="price" required=""> <br><br>
		Stock <input type="text" name="stock" required=""> <br><br>
		Image <br><br> <input type="file" name="image" required=""> <br><br>	        
	    <button type="submit" name="submit">Add package</button>
	  </div>
	  <h3 id="error" style="color: red; text-align: center;"></h3> 
	</form>

	<?php
		if (isset($_POST['submit'])) {
			$name=$_POST['name'];
			$categoryid=$_POST['category'];
			$image=$_FILES['image']['name'];
			$file_tmp=$_FILES['image']['tmp_name'];
			$description=$_POST['description'];
			$price=$_POST['price'];
			$stock=$_POST['stock'];

			include("connection.php");

			$sql = "SELECT * FROM category WHERE name='$name'";       
			$result = mysqli_query($connection, $sql);
			$numRows = mysqli_num_rows($result);

			if ($numRows>0) {
				?>
					<script language="javascript">
						document.getElementById("error").innerHTML = 'Package already exists!';	
					</script>
				<?php  			
			} else { 
				$sql = "INSERT INTO product (name, categoryId, image, description, price, stock) VALUES ('$name', '$categoryid', '$image', '$description', '$price', '$stock')";        

				$result = mysqli_query($connection, $sql);

				if (!$result) {
					?>
						<script language="javascript">				
							document.getElementById("error").innerHTML = 'DB connection Error!';
						</script>
					<?php
				} else {				
					move_uploaded_file($file_tmp, 'images/packages/'.$image);
					?>
						<script language="javascript">						
							window.location.href = "view_packages.php";
						</script>
					<?php
				}
			}
			mysqli_close($connection);	
		}
	?>

	<?php require_once ("footer.php"); ?>	
</body>
</html>


