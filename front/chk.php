<?php
// Check if condition is true

  // Collect form data
 /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $form_data = array(
      'password$password' => 'password$password',
      'email' => 'email',
      'message' => 'message'
    );
  
    // Send form data to desired page using POST method
    $url = "chk.php";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
  
    // Collecting form data using $_POST
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $email;
    echo $password;

   
  }

  `$email`

 

$table_name = 'my_table';
$sql = "SHOW TABLES LIKE '$table_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // table exists
    echo "Table '$table_name' exists in the database.";
} else {
    // table does not exist
    echo "Table '$table_name' does not exist in the database.";
}
  */

  

// Include the variables from File1.php
include 'login.php';

// Use the variables in this file
echo $useremail;  // Output: Hello World


  


?>










