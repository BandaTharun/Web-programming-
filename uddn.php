
<?php
// connecting to the DB
include 'db_connect.php';

// collecting user email and passwoed  using $_POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // checking the email and password are given are not 
    if (empty($email) || empty($password))  {
        //echo "The email and password is not filled out completely.";
    } else {


      // checking if the eamil and password  exist in the database 

      $databasepassword = "SELECT password FROM users WHERE email = '$email'";
      $result1 = mysqli_query($conn, $databasepassword);
      $stored_hash = mysqli_fetch_assoc($result1)['password'];
      
      // Hash the password entered by the user
      //$entered_password_hash = password_hash($password, PASSWORD_BCRYPT);
      
      // Compare the hashes
      if (password_verify($password, $stored_hash)) {

            // if this is true , it means that the user is having the accocunt the in the database

            //echo "Access granted.";

            //  to know who is the present user using the notebook 
            // i want the user email to be stored in  table called activeusers table , and this help a find the 
            // user table to retrive the old data and to upload new data


            $activeuser=$email;
            $sql5 = "INSERT INTO activeusers (`Email`) 
            VALUES ('$activeuser')";
            mysqli_query($conn, $sql5);



            // now i  want to know if the user is existing user or new user who just has been created the accocunt 
            
            // this condiction return if user data has been stored previously 

            $sql = "SELECT * FROM information_schema.tables WHERE table_schema = 'mydb8' AND table_name = '$email' ";  
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

              // if this condiction is true it means that the user is existing user 
                echo "Table exists";

                 // and this will redrict the user to home page 
                header("Location: home.php");
               


            } else {


              // if is condition is true it means that the user is not a existing user ,so  we 
              // need to create a new table which stores all his data 

                echo "Table does not exist";
                 $sql = "CREATE TABLE  `" . $email . "`  (id INT(100)  AUTO_INCREMENT PRIMARY KEY,
                    Title VARCHAR(100) NOT NULL,
                    Descriptions TEXT NOT NULL,
                    Timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL )";
      
                if (mysqli_query($conn, $sql)) {
                  //this displays if new table created
                 // echo " New Table is created"

                // so now the user need to redirect to the home page
                 header("Location: home.php");

                } else {

                  // if this condiction is true it means that error occured while creating a table
                     echo "Error creating table: " . mysqli_error($conn);}}

        } else {

          // if this true it means the user entered incorrect email and password 
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