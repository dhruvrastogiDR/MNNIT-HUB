<!DOCTYPE html>
<html>
<head>
	<title>Add a Problem</title>
</head>
<body>
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
</body>
</html>
