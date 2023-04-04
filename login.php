<?php
// connecting to the DB
include 'db_connect.php';
session_start();

// collecting user email and passwoed  using $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // checking the email and password are given are not 
    if (empty($email) || empty($password))  {
      echo "The email and password is not filled out completely.";
    } else {
        
        $data = "SELECT password FROM users WHERE email ='$email' ";
        $result1 = mysqli_query($conn, $data);
        $stored_hash = mysqli_fetch_assoc($result1)['password'];
        

        $entered_password_hash = password_hash($password, PASSWORD_BCRYPT);
        
      }

    if (password_verify($password, $stored_hash)) {
            $activeuser=$email;
            $sql5 = "INSERT INTO Recent_activeusers (`Email`) 
            VALUES ('$activeuser')";
            mysqli_query($conn, $sql5);
            $_SESSION['id']=$email;
                header("Location: home.php");

               } else {

          // if this true it means the user entered incorrect email and password 
            echo "<h1>YOU HAVE ENTERED INCORRECT LOGIN DETAILS TRY AGAIN </h1>";
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
<script src="validate.js"></script>
</head>
<body>

 <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" style="border:1px solid #ccc" >
   <div class="container">
     <h1> Welcome Back !! Login  And  Start Using. </h1>
     <p>Fill Details</Details> .</p>
   
       <label for="email"><b>Email</b></label>
       <div class="allinput">
         <input type="text" placeholder="Enter Email" name="email" required>
       </div>

       <label for="psw"><b>Password</b></label>
       <div class="allinput">
       <input type="password" placeholder="Enter Password" id="password"  name="password" onkeyup="validatePassword()" required>
       </div>

       <div id="password-error" style="display: none; color: blue;"></div>
       <p>Signup to create account <a href="Signup.php" style="color:dodgerblue">CLICK HERE </a>.</p>

       <div class="clearfix">
         <button type="submit" class="signupbtn" >Login </button>
       </div>
     </div>  
   </div>
  </form>
</body>
</html>