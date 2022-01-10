
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
			<h2>Album Here!</h2>
			<?php
			include 'config.php';

			$sql = "SELECT * FROM add_album";
			$result = mysqli_query($conn,$sql) or die("Query Failed");
			if(mysqli_num_rows($result) > 0){


			?>

			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Picture</th>
			      <th scope="col">Album Name</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		while($rows = mysqli_fetch_assoc($result)){
			  	 ?>
			    <tr>
			      <td><img src="<?php echo "admin/".$rows['Image'] ?>" width="100px" height="70px"></td>
			      <td><?php echo $rows['Title'] ?></td>
			      <td><a href="view-album.php?id=<?php echo $rows['album_code']; ?>"><input type="button" name="" value="View Album"></a></td>
			    </tr>
			    <?php 
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

  