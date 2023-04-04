
<?php

// connecting to the DB
include 'db_connect.php';
 

// to know  which user is the present active user , so that i can storing his  data in his data table 
$sql = "SELECT Email FROM Recent_activeusers ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  
    // this gives the  email of activeuser who have logined very latest . 
    // and we can use this email to do all the operations 
    $activeuser = mysqli_fetch_array($result)[0];
    $email=$activeuser;
    

} else {

  // is is when their is no active user username stored in the database
    echo "No rows were returned.";
}
 
?>




<?php

// collecting the user data and storing in the database 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Title']) or  $_POST['Descriptions']) {
        $Title = mysqli_real_escape_string($conn, $_POST['Title']);
        $Descriptions = mysqli_real_escape_string($conn, $_POST['Descriptions']);
        
        if (empty($Title) || empty($Descriptions))  {

          //if the user donot give both the inputs will be be displayed 
          // "The Title and Descriptions fields are required and need to be filled out completely.";
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>Error!</strong> The Title and Descriptions fields are required.
          <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
          </div>";

        } else {

          // if both the inputs are given , this will upload the data in the database

          $usertableid = "SELECT id FROM users WHERE `email`='$email'";
          $result111 = mysqli_query($conn, $usertableid);
          $userid1 = mysqli_fetch_array($result111)[0];
          $sql = "INSERT INTO USERS_NOTEBOOK_DATA (`user_id`,`email`,`Title`,`Descriptions`) 
          VALUES ('$userid1','$email', '$Title' ,'$Descriptions')";

        
          if (mysqli_query($conn, $sql)) {

            // this is true it means the the data been upload into the database sucessfully
            //echo "<h1>You have successfully added the note.</h1>";
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> You have successfully added the note.
            <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
            </div>";

          } else {
            
             // this is true it means the the data been not  upload into the database 
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

          }
        }
    } 
}

?>








<?php 

// deleteting the user selected data from his data table in  database.
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  //  collecting  if  user request i is to delete the data .

    if (isset($_POST['Delete'])) {   
        $id1 = $_POST['Delete'];

    // if this true the user want to delete the spefic id 
      // delete record from database
      $sql1 = "DELETE FROM USERS_NOTEBOOK_DATA  WHERE id=$id1";


      if (mysqli_query($conn, $sql1)) {

        // this displays if the spefied data by user is sucessfully deleted 
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> You have successfully Deleted the note.
        <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
        </div>";


      } else {

      // this displays if the their is any error while deleting the user spefied data 
        echo "Error deleting record: " . mysqli_error($conn);

      }
  }
}
  
// close database connection 
 ?>








<?php 

// updating the user selected data from his data table in  database.
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  //  collecting  if  user request i is to update the data .

    if (isset($_POST['updatetext']) or isset($_POST['updateid'])) {   
        $uptext = $_POST['updatetext'];
        $upid = $_POST['updateid'];



    // if this true the user want to delete the spefic id 
      // delete record from database
      $sql1 = " UPDATE USERS_NOTEBOOK_DATA  SET Descriptions='$uptext'  WHERE id=$upid";


      if (mysqli_query($conn, $sql1)) {

        // this displays if the spefied data by user is sucessfully deleted 
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> You have successfully Deleted the note.
        <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
        </div>";


      } else {

      // this displays if the their is any error while deleting the user spefied data 
        echo "Error deleting record: " . mysqli_error($conn);

      }
  }
}
  
// close database connection 
 ?>






















<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <Title>HOME</Title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    
    </script>




    <style>
        #get {color:white;
        background-color: orangered;}
    </style>
    <style>
        #get2 {color:white;
        background-color: green;}
    </style>
    

</head>

<body>
<div style="margin: auto;" margin-bottom: 500px;>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container-fluid">
<a class="navbar-brand" href="#">Welcome to </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="#">Notebook !!</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="#">ACTIVE USER :<?php echo $email?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Logout</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
    </ul>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
</div>
</nav>












<!-- creating the  note -->
<div class="continer " style="margin: 2%;">
<h2>Add a Note</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <div class="mb-3">
      <label for="exampleInputTitle$Title1" class="form-label">ADD Title</label>
      <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="Title"
              name="Title"></textarea>
          <label for="floatingTextarea"> enter topic name </label>
          </br>
          <div class="mb-3">
              <label for="exampleInputDescriptions1" class="form-label"> NOTE Descriptions</label>
              <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a comment here" id="Descriptions"
                      name="Descriptions" style="height: 100px"></textarea>
                  <label for="floatingTextarea2">Comments</label>
              </div>
          </div>
          <button type="submit"  class="btn btn-primary" >SAVE NOTE</button>
</form>
</div>

    <br>









<!-- creating the  table to display the all the Notes added in the database -->
<div class="container" my-3>
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Title</th>
        <th scope="col">Descriptions</th>
        <th scope="col">Actions1</th>
        <th scope="col">Actions2</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql = "SELECT * FROM USERS_NOTEBOOK_DATA WHERE `email`='$email'";
    
      $result = mysqli_query($conn, $sql);
      $sno=0;
      while($row = mysqli_fetch_assoc($result)) {
        $sno++;
        echo "<tr>
          <th scope='row'>".$sno."</th>
          <td>".$row['Title']."</td>
          <td>".$row['Descriptions']."</td>
    
          <td>
          </form>
          <form method='post' action='home.php'id ='myForm' >
          <input type='text'  name='updatetext' value=''>
          <input type='hidden'  name='updateid' value='".$row['id']."'>
          <button type='submit'  id='get2' >Update</button>
          </form>
          </td>

          <td>
          <form method='post' action='home.php' >
          <input type='hidden'  name='Delete' value='".$row['id']."'>
          <button type='submit' id='get'>Delete</button>
          </form>
          </td>
        </tr>";
      }     
    ?>

    
    </tbody>
  </table>
</div>
<hr>   
</div> 
</body>

</html>