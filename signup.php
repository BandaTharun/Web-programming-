
<?php
// connecting to the DB
include 'db_connect.php';



// collecting  user form  data using $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // collect value of input field
  
 $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
 $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
 $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $password = $_POST['password'];}


 
 
// checking the user form  data if every input is filld or not . 

if (empty($firstname) || empty($lastname) || empty($mobilenumber) || empty($email) || empty($password)) {
// if this condiction is true it means that user form data is incomplete
  //echo "the form is not filled out completely";

} else {
 
  // if this condiction is true it means that 
  // the user form is is completely filled and now we need to store this data in database
  //$sql = "INSERT INTO users (`firstname`, `lastname`, `mobilenumber`, `email`, `password`) 
  //VALUES ('$firstname' ,'$lastname', '$mobilenumber' ,'$email' ,'$password')";

    $hash = password_hash($password,PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (`firstname`, `lastname`, `mobilenumber`, `email`, `password`)
    VALUES ('$firstname', '$lastname', '$mobilenumber', '$email', '$hash')";


  if (mysqli_query($conn, $sql)) {

    // this will display if the dta is sucessfully stored in the database
    echo "<h1>You have  successfully created your account
     <a href='login.php' style='color:dodgerblue'>click here  </a> to login.</h1>";
    

  } else {

    // this will show up if the their is a problum in storing user data into data base
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
}

?>






<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/signup.css">
<title>NoteBook- Signup</title>



<style>
  
</style>

</head>
  
  
  <script src="validate.js"></script>
 
<body>

  <form name="Signup" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="border:1px solid #ccc" >
    <div class="container">
      <h1>Sign Up and  start using Private Cloud Notebook </h1>
      <p>Fill in the form to create an account.</p>
    
  
      <div class="nameditals">

        <label><b>First name </b></label>
        <div class="allinput">
          <input type="text" placeholder="Frist name" name="firstname" class="firstname"required>
        </div>
        <br>

        <label><b>Last name </b></label>
        <div class="allinput">
        
          <input type="text" placeholder="Last name" name="lastname" class="lastname" required>
        </div>
        <br>
        

        <label ><b>Mobile number</b></label>
        <div class="allinput">
          <input type="tel" placeholder="Enter mobile number" id="phone" name="mobilenumber" onkeyup="validateMobile()"  required>
        </div>
       
        <div id="phone-error" style="display: none; color: red;"></div>
        <br>
      
        <label for="email"><b>Email</b></label>
        <div class="allinput">
          <input type="text" id="email" onkeyup="validateEmail()" placeholder="Enter Email" name="email" required>
        </div>
        <div id="email-error" style="display: none; color: red;"></div>
        <br>
        

        <label for="password"><b>Password</b></label>
        <div class="allinput">
          <input type="password" placeholder="Enter Password"  id="password" name="password" onkeyup="validatePassword()"required>
        </div>
        
        <div id="password-error" style="display: none; color: red;"></div>
          
        <p>If you have already created a accocunt  <a href="login.php" style="color:dodgerblue">CLICK HERE </a>.</p>

        <div class="clearfix">
          <button type="submit" class="signupbtn" >Sign Up</button>
        </div>
      </div>  
    </div>
  </form>
</body>
</html>




























