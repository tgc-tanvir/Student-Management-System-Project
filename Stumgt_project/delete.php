<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>

  <?php
    include 'connection.php';

    if(isset($_GET['deleteid'])) {
    
     $id=$_GET['deleteid'];


     $sql= "DELETE FROM student_add WHERE id=$id";
     $result= mysqli_query($conn, $sql);
     if($result)
      { 
       
        header('location:index.php');

      }
     else
      {
        
        echo "Error deleting record".mysqli_error($conn);

      }

    }

  ?>

  </body>

</html>




