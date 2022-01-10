<?php 
include 'config.php';

if(isset($_GET['song'])){
	$song_code = $_GET['song'];
}
else{
	$song_code = "";
}

$sql = "UPDATE add_song SET Favourite = 0 WHERE Code = '$song_code'";
$result = mysqli_query($conn,$sql) or die("Query Failed!");
if($result > 0){
	header("location: all-music.php?remove=1");
}
else{
	header("location: all-music.php?err=1");
}

 ?>