<!DOCTYPE html>
<html>
<head>
	<title>iMusic</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light container">
	  <a class="navbar-brand" href="index.php">iMusic</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto"> 
	      <li class="nav-item">
	        <a class="nav-link" href="all-category.php">Category</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="all-album.php">Album</a>
	      </li>  
	      <li class="nav-item">
	        <a class="nav-link" href="all-music.php">Song</a>
	      </li> 
	      <li class="nav-item">   
		     <a class="nav-link" href="fav-song.php">Favourite</a>
	      </li> 
	    </ul>
	  </div>
	</nav>

<div class="container pt-2 pt-md-5">

	<div class="row">
		<div class="col-md-6 mt-2">
			<h2 class="text-center text-dark mb-2">Login</h2>
			<form action="login_process.php" method="post">
			  <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" name="username"  placeholder="Enter username"> 
			  </div>
			  <div class="form-group">
			    <label for="Password">Password</label>
			    <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
			  </div> 
			  <button type="submit" name="login" class="btn btn-dark float-right mt-2">Login</button>
			</form>
		</div>
		<div class="col-md-6 mt-2">
			<h2 class="text-center text-dark mb-2">Register</h2>
			<form action="signup_process.php" method="post">
			  <div class="form-group">
			    <label for="first_name">Full Name</label>
			    <input type="text" class="form-control" id="first_name" name="full_name"  required=""  placeholder="Enter full name"> 
			  </div>
			  <div class="form-group">
			    <label for="last_name">Username</label>
			    <input type="text" class="form-control" id="last_name" name="username" required=""  placeholder="Enter username"> 
			  </div>
			  <div class="form-group">
			    <label for="username">Email</label>
			    <input type="email" class="form-control" id="username" name="email"   required="" placeholder="Enter email"> 
			  </div>
			  <div class="form-group">
			    <label for="Password">Password</label>
			    <input type="password" class="form-control" id="Password" name="password"  required="" placeholder="Password">
			  </div> 
			  <button type="submit" name="signup" class="btn btn-dark float-right mt-2">Register</button>
			</form>
		</div>
	</div>

	
</div>
<?php require_once("files/footer.php"); ?> 