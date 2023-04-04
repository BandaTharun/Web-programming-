

<?php
// connecting to the DB
include 'db_connect.php';



// collecting  form data using $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // collect value of input field
  
 $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
 $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
 $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $password = mysqli_real_escape_string($conn, $_POST['password']);}


 
 
// checking the form data

if (empty($firstname) || empty($lastname) || empty($mobilenumber) || empty($email) || empty($password)) {
 // echo "the form is not filled out completely";
} else {
  // insert the data 
  $sql = "INSERT INTO users (`firstname`, `lastname`, `mobilenumber`, `email`, `password`) 
  VALUES ('$firstname' ,'$lastname', '$mobilenumber' ,'$email' ,'$password')";

  if (mysqli_query($conn, $sql)) {
    echo "<h1>You have  successfully created your account  <a href='login.php' style='color:dodgerblue'>click here  </a> to login.</h1>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
}

?>






<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/signup.css">
<title>Web chat- Signup</title>
<style>
  
</style>
</head>
<body>

  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="border:1px solid #ccc" >
    <div class="container">
      <h1>Sign Up and  start using the web chat </h1>
      <p>Fill in this form to create an account.</p>
    
  
      <div class="nameditals">
        <label><b>First name </b></label>
        
        <div class="allinput">
          <input type="text" placeholder="Frist name" name="firstname" class="firstname"required>
        </div>

        <label><b>Last name </b></label>
        <div class="allinput">
          <input type="text" placeholder="Last name" name="lastname" class="lastname" required>
        </div>
      


        <label ><b>Mobile number</b></label>
        <div class="allinput">
          <input type="tel" placeholder="Enter mobile number" name="mobilenumber" class="mobilenumber" required>
        </div>
        

        <label for="email"><b>Email</b></label>
        <div class="allinput">
          <input type="text" placeholder="Enter Email" name="email" required>
        </div>

        <label for="password"><b>Password</b></label>
        <div class="allinput">
          <input type="password" placeholder="Enter Password" name="password" required>
        </div>
    

        <p>If you have already created a accocunt  <a href="login.php" style="color:dodgerblue">CLICK HERE </a>.</p>

        <div class="clearfix">
          <button type="submit" class="signupbtn" >Sign Up</button>
        </div>
      </div>  
    </div>
  </form>





</body>
</html>




























