







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
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            //echo "Access granted.";

            $sql = "SELECT * FROM information_schema.tables WHERE table_schema = 'mydb8' AND table_name = '$email' ";  
      
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "Table exists";
                header("Location: home.php");
            } else {
                echo "Table does not exist";
                 $sql = "CREATE TABLE  `" . $email . "`  (id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    Title VARCHAR(100) NOT NULL,
                    Descriptions VARCHAR(100) NOT NULL,
                    Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Table created successfully";
                    header("Location: home.php");
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

