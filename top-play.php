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
	<ul class="list-group mt-md-3">
	  <li class="list-group-item">
	  	<h2 class="display-5">TOP 10 Hits</h2>
	  </li>
	  	<?php 

	  		include 'config.php';

	  		$sql = "SELECT * FROM add_song LIMIT 0,10";
	  		$result = mysqli_query($conn,$sql) or die("Query Failed: Song");
	  		if(mysqli_num_rows($result) > 0){
	  			while($rows = mysqli_fetch_assoc($result)){
	  		
		 ?>

	  
	  	<li class="list-group-item">
			<div class="row">
		  	   <div class="col">
			  	<div class="row">
			  		<div class="col-12">
			  			<?php echo $rows['Song_name']; ?>
			  		</div>
			  	</div>
			  	</div>
			<div class="col">  			
				</div>
			    <div class="col text-center">
			  	    <a href="top-play.php?song=<?php echo($rows['Code']); ?>" title=""><img width="50" src="img/play.png" alt="">
			  		</a>
			  	</div>
			  	</div>
			  </li>
 
	     </ul>

<?php 

	}
}

require_once("files/footer.php");
}
 ?>