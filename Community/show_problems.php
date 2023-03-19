<?php
        // Connect to the MySQL database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mnnithub";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve the problems from the database
        $sql = "SELECT problem, solution FROM problems";
        $result = mysqli_query($conn, $sql);

        // Check if there are any problems
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>" . $row['problem'] . " - " . $row['solution'] . "</li>";
            }
        } else {
            echo "No problems found";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>