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
	<title>Destination</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>		
	<?php require_once ("header.php"); ?>

	<h1 class="text-center">Add New Destination</h1>

	<form action="" method="post" enctype="multipart/form-data" style="padding-top: 20px; margin-top: 20px;">   
	  <div class="container">
	    Destination Name<input type="text" name="name" required=""> <br><br>
		Image <br><br> <input type="file" name="image" required=""> <br><br>	        
	    <button type="submit" name="submit">Add destination</button>
	  </div>
	  <h3 id="error" style="color: red; text-align: center;"></h3> 
	</form>

	<?php
		if (isset($_POST['submit'])) {
			$name=$_POST['name'];
			$image=$_FILES['image']['name'];
			$file_tmp=$_FILES['image']['tmp_name'];

			include("connection.php");

			$sql = "SELECT * FROM category WHERE name='$name'";       
			$result = mysqli_query($connection, $sql);
			$numRows = mysqli_num_rows($result);

    		if ($numRows>0) {
				?>
					<script language="javascript">
						document.getElementById("error").innerHTML = 'Destination already exists!';	
					</script>
				<?php  			
			} else { 
				$sql = "INSERT INTO category (name, image) VALUES ('$name','$image')";
				$result = mysqli_query($connection, $sql);
				if (!$result) {
				?>
					<script language="javascript">				
						document.getElementById("error").innerHTML = 'DB connection Error!';
					</script>
				<?php
				} else {					
				move_uploaded_file($file_tmp, 'images/'.$image);
				?>
					<script language="javascript">						
						window.location.href = "view_destination.php";
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


