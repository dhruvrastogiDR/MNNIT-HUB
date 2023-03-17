<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: signin.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>

      #profile{
        width: 60px;
        border-radius:10000px;
      }
     
      .nav-item{
        align-items: flex-start;
        display: flex;
      }
      #logout{
        position:absolute;
    top:0;
    right:0;
    margin-top:10px;
    cursor:pointer;
    margin-right:20px;
    border-radius:10px;
      }
      .dropdown{
        margin: 10px 10px;
      }
      .container{
        background-color: bisque;
      }
      .jumbotron{
        background-color: rgb(131, 163, 163) ;
      }

   
      </style>


    <title>MNNIT HUB!</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MNNIT HUB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Community
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </div>
             
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Hostel Management
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </div>
      <!-- <li class="nav-item">
        <a class="nav-link" href="signin.php">Signin</a>
      </li> --> <div class="dropdown">
             <li class="nav-item">
                 <a class="nav-link" href="#">Buy and Sell</a>
               </li>
               </div>
               <div class="dropdown">
              <li class="nav-item">
                <a class="nav-link disabled">Trip Planner</a>
               </li>
               </div>
              
     

      
     
   
  

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item">
        <a class="nav-link" id="logout" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg></a>
      </li>
  </ul>
  </div>


  </div>
  
</nav>


<div class="container mt-4">

<div class="jumbotron">
  <h1 class="display-4"><?php echo "Welcome ". $_SESSION['username']?>!</h1>
  <p class="lead">Now you can seamlessly interact with your college mates and know about your college and communities.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <!-- <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p> -->
  <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  MY Profile
</a>
<!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  Button with data-bs-target
</button> -->

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <!-- <h5 class="offcanvas-title" id="offcanvasExampleLabel"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/> -->
 <!-- </svg> -->
 <img src="image/me_and_dr.jpg" alt="Profile Picture" id="profile"><h2><?php echo  $_SESSION['username']?></h2>  </h5> 
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <!-- <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
        <section>
			<!-- <img src="me_and_dr.jpg" alt="Profile Picture" id="profile"> -->
			<!-- <h2>Himanshu</h2> -->
			<p> <h5> EMAIL: </h5> mnnit@gmail.com  </p>
			<p>Location: PRAYAGRAJ,UP</p>
			<p>About Me: I'm a student persuing BTECH in CSE at MNNIT ALLLAHABAD.</p>
		</section>

		<!-- Skills section -->
		<section>
			<h2>Skills</h2>
			<ul>
				<li>HTML</li>
				<li>CSS</li>
				<li>JavaScript</li>
				<li>JAVA</li>
			</ul>
		</section>

		<!-- Projects section -->
		<section>
			<h2>Projects</h2>
			<ul>
				<li><a href="#">Commmunity 1</a></li>
				<li><a href="#">Community 2</a></li>
				<li><a href="#">Community 3</a></li>
			</ul>
		</section>
     
      </ul>
    </div>
  </div>
</div>

<div>
      <h2>Here we are going to add imporatant updated and the things that are imporatant to the user</h2>

</div>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
