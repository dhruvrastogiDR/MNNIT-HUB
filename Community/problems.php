<!DOCTYPE html>
<html>
<head>
	<title>MNNIT HUB | ADD PROBLEM</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        body{
    font-family: 'Montserrat', sans-serif;
    font-size: 25px;
    margin: 7vh;
    color: #fff;
    display: flex;
}
.backvideo{
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;
}
.container{
    display: flex;
    flex-direction: column;
    margin: auto;
    background-color: rgb(0, 0, 0,0.5);
    justify-content: center;
    align-items: center;
    height: 85vh;
    width: 60%;
}
h1{
    font-size: 20pt;
    text-transform: uppercase;
    font-weight: 100;
    margin-bottom: 10vh;
}
.btn{
    display: flex;
    flex-direction: column;
    align-self: center;
    margin: auto;
}
button{
    height: 8vh;
    width: 40vh;
    border-radius: 50px;
    background-color: transparent;
    border: #F8F9FA solid 1px;
    color: #F8F9FA;
    margin:0 2vh;
    transition: 0.5s;
    transition-property: all;
    text-transform: uppercase;
    margin: 2vh;
    justify-self: center;
    align-self: center;
}
button:hover{
    background-color: rgb(248, 249, 250,0.2);
    
    border: #F8F9FA solid 1px;
}
input{
    height: 28px;
    width: 500px;
    display: grid;
    
       
}
    </style>
</head>
<body>
    <video autoplay loop muted plays-inline class="backvideo">
		<source src="C:\Users\Driti\Downloads\sea-6399.mp4" type="video/mp4">
	</video>
	<div class="container">
        <h1>Add a Problem and Solution to it According to you!</h1>
    
	<form action="add_problem.php" method="post">
		<label for="problem">Problem:</label>
		<input type="text" id="problem" name="problem">
		<br>
		<label for="solution">Solution:</label>
		<input type="text" id="solution" name="solution">
		<br>
		<button type="submit">Add Problem</button>
	</form>
	<h2>List of Problems</h2>
	<ul id="problem-list">
        <?php
            include("show_problems.php");
        ?>
		<!-- List of problems will be dynamically generated here -->
	</ul>
    </div>
</body>
</html>
