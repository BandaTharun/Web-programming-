




<?php
// connecting to the DB
include 'db_connect.php';
 
?>

<?php
$email='user222@gmail.com';
// Replace your_database_name and your_table_name with the actual names
$sql = "SELECT * FROM information_schema.tables WHERE table_schema = 'mydb8' AND table_name = '$email' ";  
      
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "Table exists";
} else {
    echo "Table does not exist";
     $sql = "CREATE TABLE  `" . $email . "`  (id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Title VARCHAR(100) NOT NULL,
        Descriptions VARCHAR(100) NOT NULL,
        Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    
    if (mysqli_query($conn, $sql)) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}

?>










//echo "Access granted.";

            // Check if the table exists.
            $table_exists_query = "SELECT * FROM information_schema.tables WHERE table_schema = 'mydb8' AND table_name = '$email'";
            $table_exists_result = mysqli_query($conn, $table_exists_query);
            $table_exists = mysqli_num_rows($table_exists_result) > 0;

            if (!$table_exists) {
                // Table does not exist, create a new one.
                $create_table_query = "CREATE TABLE $email (
                  id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  Title VARCHAR(100) NOT NULL,
                  Descriptions text NOT NULL,
                  Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

                if (mysqli_query($conn, $create_table_query)) {
                    echo "New table created with the name: $email";
                } else {
                    echo "Error creating table: " . mysqli_error($conn);
                }






















                // Check if the table exists.
            $sql = "SELECT * FROM information_schema.tables WHERE table_schema = 'mydb8' AND table_name = '$email' ";    
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) < 0) {
                // echo "Table does not exist";
                $sql = "CREATE TABLE  `" . $email . "` (id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Title VARCHAR(100) NOT NULL,
                Descriptions VARCHAR(100) NOT NULL,
                Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

            if (mysqli_query($conn, $sql)) {
                echo "Table created successfully";
                header("Location: https://datatables.net/");
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }
            } else {
                // Table already exists, print a message.
                //echo "Existing table found with the name: '$email' ";
                // Redirect to another page
              header("Location: https://www.w3schools.com/html/html_comments.asp");
                exit;}