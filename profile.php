<?php require_once("files/header.php");?>

<div class="container">
	
	<div class="row pl-0">
		<div class="col-md-8">
			<h2><img src="img/profile.png" width="30"> Profile</h2>
			<?php 
				include 'config.php';
				session_start();
				if(!isset($_SESSION['username'])){
					header("location: login.php");
				}
				else{
					$username = $_SESSION['username'];

				$sql = "SELECT * FROM user_signup WHERE Username = '$username'";
				$result = mysqli_query($conn,$sql) or die("Query Failed: Profile");
				if(mysqli_num_rows($result) > 0){
					while($rows = mysqli_fetch_assoc($result)){

			?>
			<table class="table">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">Name : </th>
			      <th scope="col"><?php echo $rows['Name']; ?></th>
			    </tr>
			    <tr>
			      <th scope="col">Email : </th>
			      <th scope="col"><?php echo $rows['Email']; ?></th>
			    </tr>
			    <tr>
			      <th scope="col">Username : </th>
			      <th scope="col"><?php echo $rows['Username']; ?></th>
			    </tr>
			<?php } ?>
			  </thead>
			  <tr>
			  	<th colspan="2"><center><a class="nav-link" href="edit-user.php"><button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Edit</button></a></center></th>
			  </tr>   
			</table>
		<?php } ?>
		</div>
	</div>

</div>

<?php
require_once("files/footer.php"); 
}
?> 
