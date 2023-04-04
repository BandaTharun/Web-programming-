







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
  echo "Access granted.";
  // Redirect to another page
  header("Location: https://getbootstrap.com/docs/5.3/components/alerts/");
  
  exit;
  
} else {
  echo "<h1>YOU HAVE ENTERED INCORRECT LOGIN DETAILS TRY AGAIN </h1>";
}

mysqli_close($conn);
}
?>






<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/signup.css">
<title>Web chat- Login</title>
<style>
 
</style>
</head>
<body>

 <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" style="border:1px solid #ccc" >
   <div class="container">
     <h1> Your Friends are waiting Login  and  start using the web chat </h1>
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

