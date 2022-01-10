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
<!-- 
[artist_id] => 5
[artist_name] => Jizzle
[artist_biography] => Jizzle was influenced by artist like Lil Wayn
[artist_details] => 
[artist_photo] => 1592902550_15623277316181_IMG_1965.jpeg
[song_id] => 2
[song_mp3] => 1592903501_24985636169454_Jizzle_-_Jealousy_(
[song_photo] => 1592903501_75222169227962_song_pic.png
[song_date] => 1592904725
[aritst_id] => 5
[song_name] => Jealousy 
[view_count] => 4
 -->
<div class="container">  
	
	<ul class="list-group  mt-5 mb-5">
	  <li class="list-group-item">
		<h2 class="display-5">Top 6 Albums Here!</h2>
	  </li>
	 <li class="list-group-item">


	 <!--  all artists songs -->
	 <div class="row">

	  	<?php 

	  		include 'config.php';

	  		$sql1 = "SELECT * FROM add_album LIMIT 0,6";
	  		$result1 = mysqli_query($conn,$sql1) or die("Query Failed: Album");
	  		if(mysqli_num_rows($result1) > 0){
	  			while($rows1 = mysqli_fetch_assoc($result1)){
	  		
		 ?>
			 <div class="col-6 col-md-2 rounded ">
				<a href="view-album.php?id=<?php echo $rows1['album_code']; ?>" title="">
					<figure>
						<img class="img-fluid rounded-circle" width="100px"   src="admin/<?php echo $rows1['Image']; ?>" alt="">
						<figcaption>
							<?php echo $rows1['Title']; ?>
						</figcaption>
					</figure>
				</a>
			</div>
		<?php 
			}
		  }
		 ?>

	 </div>

	</li>

	</ul>
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
 ?>

	<ul class="list-group mt-md-3">
	  <li class="list-group-item">
		<h2 class="display-5">Latest Songs</h2>
	  </li>
	 <li class="list-group-item">


	 <!-- Laetset songs -->
	 <div class="row">
	 	<?php 

		  	$sql2 = "SELECT * FROM add_song ORDER BY Id DESC LIMIT 0,3";
		  	$result2 = mysqli_query($conn,$sql2) or die("Query Failed: Song");
		  	if(mysqli_num_rows($result2) > 0){
		  		while($rows2 = mysqli_fetch_assoc($result2)){
	  		
		 ?>
		<div class="col-6 col-md-2 mt-3 rounded ">
			<a href="view-album.php?id=<?php echo($rows2['Album_code']); ?>&song=<?php echo($rows2['Code']); ?>" title="">
				<figure>
						<img width="50" src="img/play.png" alt="">
						<figcaption>
							<?php echo $rows2['Song_name']; ?>
						</figcaption>
					</figure>
			 </a>
		</div>

		<?php 

			}
		}
		 ?>
	 </div>

	</li>

	</ul>


</div>


<?php
 require_once("files/footer.php");
 }
?> 