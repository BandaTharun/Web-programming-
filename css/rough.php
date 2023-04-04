<?php
// connecting to the DB
include 'db_connect.php';



// collecting form data using $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);}

    // checking the form data
    if (empty($email) || empty($password))  {
        //echo "The email and password is not filled out completely.";
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  //echo "Access granted.";

    // Check if the table exists.
      $table_exists = mysqli_query($conn, "SELECT 1 FROM $email LIMIT 1");

      if (!$table_exists) {
      // Table does not exist, create a new one.
        $sql2 = "CREATE TABLE $email (
          id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          Tittle VARCHAR(100) NOT NULL,
          Descriptions text NOT NULL,
          Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

  if (mysqli_query($conn, $sql2)) {
    //echo "New table created with the name: $email";
     // Redirect to another page
      header("Location: home.php");
      exit;
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }
} else {
  // Table already exists, print a message.
  //echo "Existing table found with the name: $email";
   // Redirect to another page
   header("Location: home.php");}
  exit;
 
  
} else {
  echo "<h1>YOU HAVE ENTERED INCORRECT LOGIN DETAILS TRY AGAIN </h1>";
}

mysqli_close($conn);
}
?>