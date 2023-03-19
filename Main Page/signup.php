<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "configuration.php";

$email = $regi = $phone = $state = "";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM userse WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
        }
        mysqli_stmt_close($stmt);
    }

    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for confirm password field
    if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
        $confirm_password_err = "Passwords should match";
    }

    // defining the variables
    $email = trim($_POST['email']);
    $regi = trim($_POST['registration_no']);
    $state = trim($_POST['inputState']);
    $phone = trim($_POST['inputZip']);

    // If there were no errors, go ahead and insert into the database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO userse (username, password, email, regno, state, phone) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {

            // Set these parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;
            $param_regi = $regi;
            $param_phone = $phone;
            $param_state = $state;

            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_email, $param_regi, $param_state, $param_phone);

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: signin.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap');
   body{
       background-color: bisque;
       font-family: 'Montserrat', sans-serif;
       font-size: 16pt;
       color: rgb(255, 255, 255);
   }
   nav{
       height: 8vh;
       display: flex;
   }
   h3{
   margin: 5vh;   
   text-transform: uppercase; 
   }
   .form-control{
       color: black;
   }
  nav ul li{
   margin: 2vh;
  }
  .container{
   width: 50%;
   height: 80vh;
   background-color: rgba(0, 0, 0, 0.5);
   display: flex;
   flex-direction: column;
  }
  .btn{
   width: 20vh;
   height: 5vh;
   margin-top: 2vh;
   background-color: rgba(255, 255, 255, 0.2);
   border-radius: 20px;
   border: none;
   justify-self: center;
   align-self: center;
   transition: 0.5s all;
  }
  .btn:hover{
   background-color: rgba(255, 255, 255, 0.5);

  }
  .backvideo{
position: absolute;
right: 0;
bottom: 0;
z-index: -1;
   }
  textarea{
  width: 60vh;
   }
</style>
<title>MNNIT HUB | SIGN UP</title>
</head>
<body>
  <video autoplay loop muted plays-inline class="backvideo">
    <source src="C:\Users\Driti\Downloads\waves-71122.mp4" type="video/mp4">
</video>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">MNNIT HUB</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href="signin.php">Sign-In</a>
  </li>
  

  
 
</ul>
</div>
</nav>

<div class="container mt-4">
<h3>Please Sign-Up Here:</h3>
<hr>

<form action="" method="post">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="text">Username</label>
  <input type="text" class="form-control" name="username" id="text" placeholder="Email">
</div>
<div class="form-group col-md-6">
  <label for="inputPassword4">Password</label>
  <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
</div>
</div>
<div class="form-group">
  <label for="inputPassword4">Confirm Password</label>
  <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" name="email" id="email" placeholder="mnnitian@gmail.com">
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="registration_no.">Registration Number</label>
  <input type="text" class="form-control" name="registration_no" id="registration_no.">
</div>
<div class="form-group col-md-4">
  <label for="inputState">State</label>
  <select id="inputState" name="inputState" class="form-control">
    <option selected>Choose...</option>
   <option>Uttar Pradesh</option>
    <option>Delhi</option>
    <option>Noida</option>
    <option>Hyderabad</option>
    <option>Rajasthan</option>
    <option>Madhya Pradesh</option>
    <option>Himachal Pradesh</option>
    <option>Chattisgarh</option>
    <option>Tamil Nadu</option>
    <option>Karnataka</option>
    <option>Kerala</option>
    <option>Arunachal Pradesh</option>
    <option>Maharashtra</option>
    <option>Mizoram</option>
    <option>Manipur</option>
    <option>Punjab</option>
    <option>Haryana</option>
    <option>Bihar</option>
    <option>Jharkhand</option>
    <option>Sikkim</option>
    <option>Assam</option>
  </select>
</div>
<div class="form-group col-md-2">
  <label for="inputZip">Phone</label>
  <input type="text" class="form-control" name="inputZip" id="inputZip">
</div>

</div>
<div class="form-group">
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="gridCheck">
  <label class="form-check-label" for="gridCheck">
    Check me out
  </label>
</div>
</div>
<button type="submit" class="btn btn-primary">Sign Up</button>
</form>
</div>
<div class="form-group"
  style=
  "display:flex;
  align-items:center;
  justify-content:center;"
  >
  <p>Already have an account? <a href="signin.php">Sign in</a></p>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
