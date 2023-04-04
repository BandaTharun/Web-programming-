
<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "mydb8";

// Create a connection
$conn = mysqli_connect($servername, $username, $password1, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}?>