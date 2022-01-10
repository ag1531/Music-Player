<?php require_once("files/header.php");

include 'config.php';

session_start();
if(!isset($_SESSION['username'])){
	header("location: login.php");
}
else{
	$username = $_SESSION['username'];

if(isset($_GET['song'])){
	$song_code = $_GET['song'];
}
else{
	$song_code = "";
}

$sql = "SELECT * FROM add_song WHERE Code = '$song_code'";
$result = mysqli_query($conn,$sql) or die("Query Failed: Song");
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){

 ?>

<div class="container">
  
	<ul class="list-group mt-md-3">
	  <li class="list-group-item">
	  	<center><h3 class="display-5">Song Title : <?php echo $row['Song_name']; ?></h3></center>
	  </li>
  		  <li class="list-group-item">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="row">
		  				<div class="col-12">
		  					<b>Song Title: <?php echo $row['Song_name']; ?></b>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="col-md-6">
		  			<audio controls autoplay="">
					  <source src="horse.ogg" type="audio/ogg">
					  <source src="admin/<?php echo $row['Path']; ?>" type="audio/mpeg">
					</audio> 
		  		</div>
		  	</div>
		  </li>
	</ul>
</div>
<?php 

}
}

?>


<div class="container">
	
	<div class="row pl-0">
		<div class="col-md-8">
			<h2> Song Here!</h2>
			<?php 
				$sql1 = "SELECT * FROM add_song WHERE Favourite = 1 ";
				$result1 = mysqli_query($conn,$sql1);
				if(mysqli_num_rows($result1) > 0){

			 ?>
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Sn</th>
			      <th scope="col">Song Name</th>
			      <th scope="col" colspan="2">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		$i=1;
			  		while($rows1 = mysqli_fetch_assoc($result1)){
			  	 ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $rows1['Song_name'] ?></td>
			      <td>
			      	<a href="fav-song.php?song=<?php echo $rows1['Code']; ?>"><img width="30" src="img/play.png" alt=""></a>
			      </td>
			      <td>
			     	<a href="remove-fav.php?song=<?php echo $rows1['Code']; ?>" ><img width="25" src="img/1.png" alt=""></a>
			      </td>
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
