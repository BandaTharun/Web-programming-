



<?php


 // delete record from database
 $sql = "DELETE FROM table_name WHERE id = $id";
 if ($conn->query($sql) === TRUE) {
     echo "Record deleted successfully";
 } else {
     echo "Error deleting record: " ;
 }

?>