<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Митрофанов А.В.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container my-5">

      <div class="row justify-content-center mb-4">
        <div class="col-md-6 text-center">
          <h1 class="display-5">Registration</h1>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-6">
          <form method="POST" action="registration.php" class="p-4 border rounded bg-light shadow-sm">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit">Continue</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<?php
	require_once("dbtest.php");
	if (isset($_COOKIE['User'])) {
    		header("Location: profile.php");
	}
	$link = new mysqli('127.0.0.1', 'root', 'P@ssw0rd', 'mywebdb');


	if (isset($_POST['submit'])) {
    		$email = $_POST['email'];
    		$username = $_POST['username'];
    		$password = $_POST['password'];


    		if (!$email || !$username || !$password) die ('Please fill out every forms');

    		$sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

    		if(!mysqli_query($link, $sql)) {
        		echo "Could not create a user";
    		}
	}
?>
