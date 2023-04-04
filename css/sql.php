






// Insert data into table
$sql = "INSERT INTO users (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>





<?php

// connecting to the sql database


$servername = "localhost";
$username = "root";
$password1 = "";

// Create connection
$conn = new mysqli($servername,$username,$password1);


// Check connection
if ($conn->connect_error) {
  die("    Connection failed: " . $conn->connect_error);
}
echo "Connected successfully        ";


// sql to creating new database
$sql1 = "CREATE DATABASE USER11";
if ($conn->query($sql1) === TRUE) {
  echo "    Database created successfully      ";
} else {
  echo "Error creating database: " . $conn->error;
}

?>





<?php
//  creating  create table in sql data base 

$sql2= "CREATE TABLE useraccounts (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  mobilenumber INT(12)
  email VARCHAR(50),
  psd VARCHAR(100)
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  
  if ($conn->query($sql2) === TRUE) {
    echo "   created  data table successfully     ";
  }else {
    echo "Error creating table: " . $conn->error;
  }


// inserting data into sql database 


$sql3 = "INSERT INTO useraccounts (firstname,lastname,mobilenumber,email,psd)
VALUES ($fristname, $lastname, $mobilenumber, $email,$password)";

if ($conn->query($sql3) === TRUE) {
  echo "  New record created successfully   ".$sql3;
} else {
  echo "Error: " . $sql3. "<br>" . $conn->error;
}

?>












<?php
/*
// prepare and bind

$stmt = $conn->prepare("INSERT INTO useraccocunts (firstname,lastname,mobilenumber, email,pswd) VALUES (?, ?, ?,?)");
$stmt->bind_param("sss", $firstname, $lastname,$mobilenumber, $email,$password);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
*/
?>








// insterting the data 
  $sql = "INSERT INTO users (`firstname`, `lastname`, `mobilenumber`, `email`, `psd`) 
      VALUES ('$firstname[0]' ,'$lastname[0]', '$mobilenumber[0]' ,'$email[0]' ,'$password[0]')";



 if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
 } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

 mysqli_close($conn);














// Create database
$sql = "CREATE DATABASE mydb8";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}


// Select database
mysqli_select_db($conn, "mydb8");

// Create table
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    mobilenumber VARCHAR(12),
    email VARCHAR(50),
    psd VARCHAR(50),
    reg_date TIMESTAMP)";
  
  
  if (mysqli_query($conn, $sql)) {
      echo "Table users created successfully";
  } else {
      echo "Error creating table: " . mysqli_error($conn);
  }
  