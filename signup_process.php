<?php 
include 'config.php';

if(isset($_POST['signup'])){
	$fname = mysqli_real_escape_string($conn,$_POST['full_name']);
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,md5($_POST['password']));

	$sql = "SELECT * FROM user_signup WHERE Username = '$username' AND Email = '$email'";
	$result = mysqli_query($conn,$sql) or die("Query Failed: Check");
	$count = mysqli_num_rows($result);
	if($count == 1){
		echo "<script>
			alert('Username & Email is Already Taken');
		</script>";
	}
	
	$sql1 = "INSERT INTO user_signup(Name,Username,Email,Password)VALUES('$fname','$username','$email','$password')";
	$result1 = mysqli_query($conn,$sql1) or die("Query Failed: Insert");
	if($result1){
		header("location: login.php?signup&success=1");
	}
	else{
		header("location: signup.php?tryagain=1");
	}
}


 ?>