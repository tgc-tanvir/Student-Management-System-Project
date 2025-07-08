<?php
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="left">
     <p id="demo">American International University-Bangladesh</p>
     </div>
     <div class="right">
     <a href="index.php" class="btn btn-primary">Home</a>
     <a href="add_student.php" class="btn btn-success">Registration</a>
     <a href="index.php" class="btn btn-info">Student List</a><br><br>
    </div>
      <div class="container">
        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Department</th>
      <th scope="col">University Name</th>
      <th scope="col">Student ID</th>
      <th scope="col">Address</th>
    </tr>

  </thead>
  <tbody>
    <?php
       $id=$_GET['showid'];
       $sql="SELECT id,firstname,lastname,email,phone,dept_name,uniname,student_id,student_address FROM `student_add` WHERE id=$id";
       
       $result= mysqli_query($conn, $sql);
       
      if($result)
      {

        $row=mysqli_fetch_assoc($result);

           $id=$row['id'];
           $name=$row['firstname'] .' '.$row['lastname'];
           $email=$row['email'];
           $phone=$row['phone'];
           $department=$row['dept_name'];
           $uniname=$row['uniname'];
           $stuid=$row['student_id'];
           $stuaddress=$row['student_address'];
           
           echo '<tr>
               <th scope="row">'.$id.'</th>
               <td>'.$name.'</td>
               <td>'.$email.'</td>
               <td>'.$phone.'</td>
               <td>'.$department.'</td>
               <td>'.$uniname.'</td>
               <td>'.$stuid.'</td>
               <td>'.$stuaddress.'</td>
               </tr>';

      }
    ?>

  </tbody>
</table>
    </div>

  <div class="footer">
  <p>&copy; 2025 Tanvir. All rights reserved.</p>
  </div>

  <script>
    document.getElementById("demo").style.color="green";
  </script>
    
</body>
</html>