
<?php
 require_once("files/header.php");

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
			<h2>Category Song!</h2>
			<?php
			include 'config.php';

			if(isset($_GET['id'])){
				$code = $_GET['id'];
			}
			else{
				$code = "";
			}
			

			$sql = "SELECT * FROM add_album WHERE Category = '$code'";
			$result = mysqli_query($conn,$sql) or die("Query Failed: Category");
			if($row = mysqli_fetch_assoc($result)){
				$album_code = $row['album_code'];
			}

			$sql1 = "SELECT * FROM add_song WHERE Album_code = '$album_code'";
			$result1 = mysqli_query($conn,$sql1) or die("Query Failed: Song");
			if(mysqli_num_rows($result1) > 0){


			?>

			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Sn</th>
			      <th scope="col">Song Name</th>
			      <th scope="col">Album</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		$i=1;
			  		while($rows = mysqli_fetch_assoc($result1)){

			  	 ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $rows['Song_name'] ?></td>
			      <td><?php echo $rows['Song_name'] ?></td>
			      <td><a href="play.php?id=<?php echo $rows['Code'] ?>&album=<?php echo $album_code ?>&cate=<?php echo $code; ?>"><img width="50" src="img/play.png" alt=""></a></td>
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

  