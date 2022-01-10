<?php 
	
require_once("files/header.php"); 

include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
	header("location: login.php");
}
else{
	$username = $_SESSION['username'];


if(isset($_GET['id'])){
	$song_code = $_GET['id'];
}
else{
	$song_code = "";
}
if(isset($_GET['cate'])){
	$category = $_GET['cate'];
}
else{
	$category = "";
}


$sql1 = "SELECT * FROM add_category WHERE Code = '$category'";
$result1 = mysqli_query($conn,$sql1) or die("Query Failed: Category");
$row = mysqli_fetch_assoc($result1);

$sql = "SELECT * FROM add_song WHERE Code = '$song_code'";
$result = mysqli_query($conn,$sql) or die("Query Failed: Song");
if(mysqli_num_rows($result) > 0){
	while($rows = mysqli_fetch_assoc($result)){


?> 
<!-- 
  [artist_id] => 4
    [artist_name] => Sheebah Karungi
    [artist_biography] => Sheebah Karungi is a Ugandan recording artist
    [artist_details] => 
    [artist_photo] => 1592129479_31892627593739_howwebiz_88e723f97cde9c8b7eb0aaaabcacbe51_1464525504_cover.jpg
    [song_id] => 8
    [song_mp3] => 1593507781_25997519201764_Harmonize_&_Sheebah_-_Follow_Me.mp3
    [song_photo] => 1593507781_69484951915618_shebah.png
    [song_date] => 
    [aritst_id] => 4
    [song_name] => Follow Me
    [view_count] => 0
    [download_count] => 0
 -->
<div class="container">  
	<ul class="list-group mt-md-3">
	  <li class="list-group-item">
	  	<center><h3 class="display-5">Category : <?php echo $row['Category_name']; ?></h3></center>
	  </li>
	  <?php 
	  	$album = $_GET['album'];

			$sql = "SELECT * FROM add_album WHERE album_code = '$album'";
			$result = mysqli_query($conn,$sql) or die("Query Failed");
			if(mysqli_num_rows($result) > 0){
				while($rows1 = mysqli_fetch_assoc($result)){

	   ?>
  		  <li class="list-group-item">
		  	<div class="row">
		  		<div class="col-md-2">
		  			<img class="img-fluid rounded"  src="admin/<?php echo $rows1['Image']; ?>" width="100px" height="50px" alt="">
		  		</div>
		  		<div class="col-md-4">
		  			<div class="row">
		  				<div class="col-12">
		  					<b>Song Title: <?php echo $rows['Song_name']; ?></b>
		  				</div>
		  				<div class="col-12">
		  					<b>Album:  <?php echo $rows1['Title']; ?></b>
		  				</div>
		  				<div class="col-12">
		  					<b>Category:  <?php echo $row['Category_name']; ?></b>
		  				</div>
		  				<div class="col-12">
		  					<b>Year:  <?php echo $rows1['Year']; ?></b>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="col-md-4">
		  			<audio controls autoplay="">
					  <source src="horse.ogg" type="audio/ogg">
					  <source src="admin/<?php echo $rows['Path']; ?>" type="audio/mpeg">
					</audio> 
		  		</div>
		  	</div>
		  </li>
	</ul>


	<!-- Latest songs -->
	<ul class="list-group mt-md-3">
	  <li class="list-group-item">
		<h2 class="display-5">Related Songs</h2>
	  </li>
	 
	 <!-- Laetset songs -->
	  	<?php 
	  	//$album = $_GET['album'];

	  	$sql = "SELECT * FROM add_song WHERE Album_code ='$album'";
			$result = mysqli_query($conn,$sql) or die("Query Failed");
			if(mysqli_num_rows($result) > 0){
				while($latest_songs = mysqli_fetch_assoc($result)){
		  	
	  		 ?>
	  		 <table >
	  		 	<tr>
	  		 		<ul class="list-group mt-md-3">
	  		 		<a href="play.php?id=<?php echo($latest_songs['Code']); ?>&album=<?php echo $album; ?>&cate=<?php echo $category; ?>" title="">
					  <li class="list-group-item">					  
					  <img src="admin/<?php echo $rows1['Image']; ?>" width="100px" height="">
					  <p class="display-6"><?php echo($latest_songs['Song_name']); ?></p>
					  </li>
					  </a>
	  		 	</tr>
	  		 </table>
					
			

	 
<?php 
					}
				}
			}
 		}
 	}
}
		
 ?>

<?php
require_once("files/footer.php");
	}
?> 