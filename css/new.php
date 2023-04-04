
















<?php
// connecting to the DB
include 'db_connect.php';


 
?>


<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Delete'])) {   
    $id1 = $_POST['Delete'];
      // delete record from database
      $sql1 = "DELETE FROM Notes WHERE id=$id1";
      if (mysqli_query($conn, $sql1)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> You have successfully Deleted the note.
        <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
        </div>";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
  }
}
  
  // close database connection
 
 ?>














<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Title']) or  $_POST['Descriptions']) {
        // Do something with name1
        $Title = mysqli_real_escape_string($conn, $_POST['Title']);
        $Descriptions = mysqli_real_escape_string($conn, $_POST['Descriptions']);
        
        if (empty($Title) || empty($Descriptions))  {
          //echo "The Title and Descriptions fields are required and need to be filled out completely.";
          echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>Error!</strong> The Title and Descriptions fields are required.
          <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
          </div>";
        } else {
          // Insert the data 
          $sql = "INSERT INTO Notes (`Title`, `Descriptions`) 
          VALUES ('$Title' ,'$Descriptions')";
        
          if (mysqli_query($conn, $sql)) {
            //echo "<h1>You have successfully added the note.</h1>";
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> You have successfully added the note.
            <button type='button' class='btn-close' data-dismiss='alert' aria-label='Close'></button>
            </div>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
    } 
}
    
    

?>






















<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
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

    

</head>

<body>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editmodalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>















    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
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
                        <a class="nav-link" href="#">Link</a>
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
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>













    <div class="continer " style="margin:2%;">
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
                    <button type="submit" class="btn btn-primary" >ADD NOTE</button>
        </form>
    </div>

    <br>

    <div class="container" my-3>
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Title</th>
        <th scope="col">Descriptions</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $sql = "SELECT * FROM Notes";
      $result = mysqli_query($conn, $sql);
      $sno=0;
      while($row = mysqli_fetch_assoc($result)) {
        $sno++;
        echo "<tr>
          <th scope='row'>".$sno."</th>
          <td>".$row['Title']."</td>
          <td>".$row['Descriptions']."</td>
          <td>
          <form method='post' action='new.php' >
          <input type='hidden' name='Delete' value='".$row['id']."'>
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



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script>
    edit=document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
      element.addEventListener('click',e);
      console.log('edit',e);

    })
  </script>
</body>

</html>


























<?php




?>


