<!DOCTYPE html>
<html>
<head>
	<title>Trevel Agency</title>
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

	<div style="background-color: white; padding: 0px 20px 0px 20px;">
		<h1>About us</h1>
		<h2 class="text-center">Our Story</h3>
		<h3 class="text-center">In 2010, Fine & Fair(Pvt) Ltd Travels took flight, piloted by Ravi, our CEO and Founder, with the main aim of becoming the best personalised travel agent in the world! This one-man show quickly gathered speed as the team at Fine & Fair(Pvt) Ltd grew, fast and wide. Fine & Fair(Pvt) Ltd Travels, spearheaded by Ravi, grew faster by attracting the right people around him. An integral part of our growth lies with listening to our customers valuable feedback and improving ourselves, where we compete with ourselves everyday!</h3>
		<div class="text-right">
			<a style="text-decoration: none; color: red; font-weight: bold;" href="about.php">See more about us & our services...</a>
	  	</div>
	  </div>
	
	<div class="row" style="padding: 20px 15px 45px; margin: 20px">
	    <div style="background: #f1f1f1; padding: 10px; height: 100%; width: 100%; text-align: center;">
	    <h1 class="text-center">Best Selling Destinations</h1>
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
		<p><button id="vmp" class="more-button">View More Destinations</button></p>
	  	<script language="javascript">				
			document.getElementById("vmp").onclick = function(){
				window.location.href = "destination.php";
			}
		</script>
	  </div>
	 </div>

	<div class="card">
		<div class="text-center">
			<h1>Have any inquiries? </h1>
			<h3>Feel free to contact us!  Contact Fine & Fair(Pvt) Ltd 24/7 through the official website. Please fill out our form, and we’ll get in touch shortly.</h3>
			<a style="text-decoration: none; color: red; font-weight: bold;" href="contact.php">Submit your inquiry now.</a>
		</div>
	</div>

	<?php require_once ("footer.php"); ?>	
</body>
</html>
