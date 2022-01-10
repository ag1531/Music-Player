<?php 
include 'config.php';
if(isset($_POST['login'])){
	$username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));

    $sql = "SELECT * FROM user_signup WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn,$sql) or die("Query Failed: Login");
    $count = mysqli_num_rows($result);
    if($count ==1){
    	while($rows = mysqli_fetch_assoc($result)){
    		session_start();
    		$_SESSION['username'] = $rows['Username'];
    		$_SESSION['email'] = $rows['Email'];
    		header("location: index.php?login&success=1");
    	}
    }
    else{
    	header("location: login.php?tryagain=1");
    }
}

?>