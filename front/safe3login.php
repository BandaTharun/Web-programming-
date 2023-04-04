

<?php


// connecting to the DB
include 'db_connect.php';




// Check if condition is true





// collecting form data using $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = ( $_POST['email']);
    $password =( $_POST['password']);
    echo $email;
    echo $password;
}


?>











<?php
// connecting to the DB
include 'db_connect.php';

// collecting form data using $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // checking the form data
    if (empty($email) || empty($password))  {
        //echo "The email and password is not filled out completely.";
    } else {
      // checking if the eamil and password are exist in the database
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            //echo "Access granted.";

            $sql = "SELECT * FROM information_schema.tables WHERE table_schema = 'mydb8' AND table_name = '$email' ";  
      
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "Table exists";
                $form_data = array('email' => $email,'password' => $password );

                $useremail=$email;
                



                // Create a hidden form using JavaScript
                   echo '<script>';
                   echo 'var form = document.createElement("form");';
                   echo 'form.style.display = "none";'; // Hide the form
                   echo 'form.method = "post";';
                   echo 'form.action = "home.php";'; // Change the action URL to your form processor URL
                    // Add the form data as hidden input fields
                   foreach ($form_data as $name => $value) {
                     echo 'var input = document.createElement("input");';
                     echo 'input.type = "hidden";';
                     echo 'input.name = "' . $name . '";';
                     echo 'input.value = "' . htmlspecialchars($value, ENT_QUOTES) . '";'; // Escape special characters
                     echo 'form.appendChild(input);';
                   }
                    // Submit the form
                     echo 'document.body.appendChild(form);';
                     echo 'form.submit();';
                     echo '</script>';

                     exit(); // Exit to prevent further processing


            } else {
                echo "Table does not exist";
                 $sql = "CREATE TABLE  `" . $email . "`  (id INT(100)  AUTO_INCREMENT PRIMARY KEY,
                    Title VARCHAR(100) NOT NULL,
                    Descriptions TEXT NOT NULL,
                    Timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL )";
                    $useremail=$email;
                
                if (mysqli_query($conn, $sql)) {
                  $form_data = array('email' => $email,'password' => $password );
                  // Create a hidden form using JavaScript
                     echo '<script>';
                     echo 'var form = document.createElement("form");';
                     echo 'form.style.display = "none";'; // Hide the form
                     echo 'form.method = "post";';
                     echo 'form.action = "home.php";'; // sending to home page
                      //  the form data as hidden input fields
                     foreach ($form_data as $name => $value) {
                       echo 'var input = document.createElement("input");';
                       echo 'input.type = "hidden";';
                       echo 'input.name = "' . $name . '";';
                       echo 'input.value = "' . htmlspecialchars($value, ENT_QUOTES) . '";'; // Escapeing special characters
                       echo 'form.appendChild(input);';
                     }
                      // Submit the form
                       echo 'document.body.appendChild(form);';
                       echo 'form.submit();';
                       echo '</script>';
  
                       exit(); // Exiting to prevent further processing

                } else {
                    echo "Error creating table: " . mysqli_error($conn);
                }
            }

            
        } else {
            echo "<h1>YOU HAVE ENTERED INCORRECT LOGIN DETAILS TRY AGAIN </h1>";
        }
    }
}


?>















<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/signup.css">
<title>NOTEBOOK- Login</title>
<style>
 
</style>

</head>
<body>

 <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" style="border:1px solid #ccc" >
   <div class="container">
     <h1> Welcome Back !! Login  And  Start Using. </h1>
     <p>Fill and start using .</p>
   
       <label for="email"><b>Email</b></label>
       <div class="allinput">
         <input type="text" placeholder="Enter Email" name="email" required>
       </div>

       <label for="psw"><b>Password</b></label>
       <div class="allinput">
         <input type="password" placeholder="Enter Password" name="password" required>
       </div>
       
       <p>Signup to create accocunt <a href="Signup.php" style="color:dodgerblue">CLICK HERE </a>.</p>

       <div class="clearfix">
         <button type="submit" class="signupbtn" >Login </button>
       </div>
     </div>  
   </div>
 </form>

</body>
</html>

