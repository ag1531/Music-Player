<?php require_once("files/header.php");

include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
	header("location: login.php");
}
else{
	$username = $_SESSION['username'];

 ?> 
<div class="container">
	
	<div class="row pl-0">
		<?php include 'files/side_bar.php'; ?>
		<div class="col-md-8">
			<h2>Category Here!</h2>
			<?php
			include 'config.php';

			$sql = "SELECT * FROM add_category";
			$result = mysqli_query($conn,$sql) or die("Query Failed");
			if(mysqli_num_rows($result) > 0){


			?>

			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Sn</th>
			      <th scope="col">Category Name</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		$i=1;
			  		while($rows = mysqli_fetch_assoc($result)){
			  	 ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $rows['Category_name'] ?></td>
			      <td><a href="song.php?id=<?php echo $rows['Code']; ?>"><input type="button" name="" value="View All Song"></a></td>
			    </tr>
			    <?php 
			    	$i++;
			    	}
			     ?>
			  </tbody>   
			</table>
			<?php 
				}
			 ?>

		</div>
	</div>

</div>


<?php 
require_once("files/footer.php");
 }
?> 
