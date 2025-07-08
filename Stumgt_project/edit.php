<?php 
  session_start();
  include 'connection.php';
  $id=$_GET['editid'];
  $sql="SELECT * FROM `student_add` WHERE id=$id";

  $result=mysqli_query($conn, $sql);
  $row= mysqli_fetch_assoc($result);
  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
  $email=$row['email'];
  $phone=$row['phone'];
  $department=$row['dept_name'];
  $uniname=$row['uniname'];
  $stuid=$row['student_id'];
  $stuaddress=$row['student_address'];

 if(isset($_POST['submit']))
 {
    
    $firstname= $_POST['fname'];
    $lastname= $_POST['lname'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $department= $_POST['dept'];
    $uniname= $_POST['uni_name'];
    $stuid= $_POST['sid'];
    $stuaddress= $_POST['saddress'];

    $sql="UPDATE `student_add` SET id=$id,firstname='$firstname',lastname='$lastname',email='$email',phone='$phone',dept_name='$department',uniname='$uniname',student_id='$stuid',student_address='$stuaddress' WHERE id=$id";

    
    if(mysqli_query($conn, $sql))
     {

         $_SESSION['success_message'] = "Student updated successfully!";
         header("location:edit.php?editid=$id");
         exit();

     }
    else 
    {
      echo "Error: " . $sql . "<br>" .mysqli_error($conn);

    }

 }

?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Edit</title>
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

    <div class="container my-5">
    <?php
         if (isset($_SESSION['success_message'])) 
         {
            echo '<div class="alert alert-success text-center">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
         }
    ?>
   <form name="myForm" id="myForm" onsubmit="return validateForm()" method="post">
    <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="Enter First Name" name="fname" autocomplete="off" value=<?php echo $firstname;?>>
    </div>

    <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" autocomplete="off" value=<?php echo $lastname;?>>
    </div>

    <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" onchange="return validateEmail()" autocomplete="off" value=<?php echo $email;?>>
    </div>

    <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" placeholder="Enter Phone No" id="phone" name="phone" onchange="return validatePhoneNumber()" autocomplete="off" value=<?php echo $phone;?>>
    </div>

    <div class="form-group">
    <label>Department</label>
    <input type="text" class="form-control" placeholder="Enter Department" name="dept" autocomplete="off" value=<?php echo $department;?> readonly>
    </div>

    <div class="form-group">
    <label>University Name</label>
    <input type="text" class="form-control" placeholder="Enter University Name" name="uni_name" autocomplete="off" value=<?php echo $uniname;?> readonly>
    </div>

    <div class="form-group">
    <label>Student ID</label>
    <input type="text" class="form-control" placeholder="Enter Student ID" name="sid" autocomplete="off" value=<?php echo $stuid;?> readonly>
    </div>

    <div class="form-group">
    <label>Student Address</label>
    <input type="text" class="form-control" placeholder="Enter Student Address" name="saddress" autocomplete="off" value=<?php echo $stuaddress;?>>
    </div>

    <br><button type="submit" class="btn btn-primary" name="submit">Update</button>
    <div id="emailValidationMsg"></div>
    <div id="phoneValidationMsg"></div> 
    </form>
    </div>
    <div class="footer">
    <p>&copy; 2025 Tanvir. All rights reserved.</p>
    </div>

  <script>
     function validateForm() 
     {
      let x = document.forms["myForm"]["fname"].value;
     if (x == "") 
     {
     alert("First name must be filled out!");
     return false;
     } 
     let y = document.forms["myForm"]["lname"].value;

     if (y == "") 
     {
     alert("Last name must be filled out!");
     return false;
     }
     
     let z = document.forms["myForm"]["email"].value;

     if (z == "") 
     {
     alert("Email must be filled out!");
     return false;
     }

    let p = document.forms["myForm"]["phone"].value;
     
    if (p == "") 
     {
     alert("Phone must be filled out!");
     return false;
     }

    }

</script>
   <script>

      function validateEmail()
       {
         const email = document.getElementById("email").value;
         const pattern = /^[a-zA-Z0-9._%+-]+@aiub\.edu$/;
         const isValid = pattern.test(email);

         document.getElementById('emailValidationMsg').textContent = isValid ? '' : 'Please enter a valid email address';
         document.getElementById('emailValidationMsg').style.color="red";

         return isValid;
       }

    </script>

    <script>

     document.addEventListener('DOMContentLoaded', function() 
      {

        document.getElementById('myForm').addEventListener('submit', function(event)
        {

          if (!validateEmail()) 
           {
            event.preventDefault();
           }
        });
      });
    </script>

    <script>

    function validatePhoneNumber() 
     {
       const phoneNumber = document.getElementById("phone").value.trim();

       const pattern = /^\d{11}$/;

       const isValid = pattern.test(phoneNumber);
       document.getElementById('phoneValidationMsg').textContent = isValid ? '' : 'Please enter a valid 11 digit phone number';
       document.getElementById('phoneValidationMsg').style.color="red";
       return isValid;
     }
</script>

<script>

document.addEventListener('DOMContentLoaded', function() 
{

    document.getElementById('myForm').addEventListener('submit', function(event)
     {

        if (!validatePhoneNumber()) 
        {
            event.preventDefault();
        }
    });
});
</script>


  </body>
</html>
