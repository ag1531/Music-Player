<?php require_once("files/header.php");

include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
	header("location: login.php");
}
else{
	$username = $_SESSION['username'];

	if(isset($_POST['edit'])){
		$name = mysqli_real_escape_string($conn,$_POOST['full_name']);
		$password = mysqli_real_escape_string($conn,md5($_POST['password']));
		$cpassword = mysqli_real_escape_string($conn,md5($_POST['cpassword']));

		if($password == $cpassword){
			$sql = "UPDATE user_signup SET Name = '$name', Password = '$password' WHERE Username = '$username'";
			$result = mysqli_query($conn,$sql) or die("Query Failed: Update");
			if($result > 0){
				header("location: profile.php");
			}
			else{
				header("location: edit-user.php");
			}
		}
		else{
			echo "<div class='alert alert-danger'>Password did not matched!</div>";
		}
	}

?>
<div class="container pt-2 pt-md-5">

	<div class="row">
	
		<div class="col-md-6 mt-2">
			<h2 class="text-center text-dark mb-2">Update</h2>

			<form action="" method="post">
			  <div class="form-group">
			    <label for="first_name">Full Name</label>
			    <input type="text" class="form-control" id="first_name" name="full_name"  required=""  placeholder="Enter full name"> 
			  </div>
			  
			  <div class="form-group">
			    <label for="Password">Password</label>
			    <input type="password" class="form-control" id="Password" name="password"  required="" placeholder="Password">
			  </div>
			  <div class="form-group">
			    <label for="Password">Confirm Password</label>
			    <input type="password" class="form-control" id="Password" name="cpassword"  required="" placeholder="Confirm Password">
			  </div> 
			  <button type="submit" name="edit" class="btn btn-dark float-right mt-2">Save Changes</button>
			</form>
		</div>
	</div>

	
</div>
<?php require_once("files/footer.php");
}
 ?> 