<?php 

  session_start();
  include 'connection.php';
 if(isset($_POST['submit']))
 {
    
    $firstname= $_POST['fname'];
    $lastname= $_POST['lname'];
    $email = $_POST["email"];
    $phone= $_POST['phone'];
    $department= $_POST['dept'];
    $uniname= $_POST['uni_name'];
    $stuid= $_POST['sid'];
    $stuaddress= $_POST['saddress'];

    $sql="INSERT INTO student_add (firstname, lastname, email, phone, dept_name, uniname, student_id, student_address)
    VALUES ('$firstname', '$lastname', '$email', '$phone', '$department', '$uniname', '$stuid', '$stuaddress')";

    
    if(mysqli_query($conn, $sql))
     {
         
        $_SESSION['success'] = "Student added successfully!";
        header('location: add_student.php');
        exit();

     }

    else 
    {
      echo "Error: " . $sql . "<br>" .mysqli_error($conn);

    }

 }

?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Add New User</title>
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

    <div class="form-submit">
      <?php
       if (isset($_SESSION['success'])) 
       {
       echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
       unset($_SESSION['success']);
       }
      ?>
    <form name="myForm" id="myForm" onsubmit="return validateForm()" method="post">
    <div class="form-group">
    <label>First Name</label>
    <input type="text" id="fname" class="form-control" placeholder="Enter First Name" name="fname" autocomplete="off">
     <span id="fn_error"></span>
    </div>

    <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" id="lname" autocomplete="off">
     <span id="ln_error"></span>
    </div>

    <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" onchange="return validateEmail()" autocomplete="off">
     <span id="email_error"></span>
    </div>

    <div class="form-group">
    <label>Phone</label>
    <input type="tel" id="phone" class="form-control" placeholder="Enter Phone No" name="phone" onchange="return validatePhoneNumber()" autocomplete="off">
     <span id="phone_error"></span>
    </div>

    <div class="form-group">
    <label>Department</label>
    <input type="text" id="dept" class="form-control" placeholder="Enter Department"  name="dept" autocomplete="off">
     <span id="dept_error"></span>
    </div>

    <div class="form-group">
    <label>University Name</label>
    <input type="text" class="form-control" placeholder="Enter University Name" id="uni_name" name="uni_name" autocomplete="off">
     <span id="uniname_error"></span>
    </div>

    <div class="form-group">
    <label>Student ID</label>
    <input type="text" class="form-control" placeholder="Enter Student ID" id="sid" name="sid" autocomplete="off">
     <span id="sid_error"></span>
    </div>

    <div class="form-group">
    <label>Student Address</label>
    <input type="text" class="form-control" placeholder="Enter Student Address" name="saddress" autocomplete="off">
    </div>

    <br><button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <div id="emailValidationMsg"></div>
    <div id="phoneValidationMsg"></div>
    
    </form>
    </div>
    <div class="footer">
    <p>&copy; 2025 Tanvir. All rights reserved.</p>
    </div>

   <script>
     document.getElementById("demo").style.color="green";
   </script>

   <script>
     function validateForm() 
     {

      var status = true;
      
      
      let x = document.forms["myForm"]["fname"].value;
      if (x == "") 
      {
        document.getElementById("fn_error").innerHTML="First Name is required.";
        document.getElementById("fn_error").style.color="red";
        status=false;
      } 
      else
      {
          document.getElementById("fn_error").innerHTML="";
          status=true;
      }
      
     let y = document.forms["myForm"]["lname"].value;

     if (y == "") 
     {
       document.getElementById("ln_error").innerHTML="Last Name is required.";
       document.getElementById("ln_error").style.color="red";
       status=false;
     }
      else
       {
          document.getElementById("ln_error").innerHTML="";
          status=true;
       }
      
      let z = document.forms["myForm"]["email"].value;

     if (z == "") 
      {
        document.getElementById("email_error").innerHTML="Email is required.";
        document.getElementById("email_error").style.color="red";
        status=false;
      }

      else
       {
          document.getElementById("email_error").innerHTML="";
          status=true;
       }

     let p = document.forms["myForm"]["phone"].value;
     if (p == "") 
      {
        document.getElementById("phone_error").innerHTML="Phone No is required.";
        document.getElementById("phone_error").style.color="red";
        status=false;
      } 
      else
       {
          document.getElementById("phone_error").innerHTML="";
          status=true;
       }

     let q = document.forms["myForm"]["dept"].value;

     if (q == "") 
     {
        document.getElementById("dept_error").innerHTML = "Department is required.";
        document.getElementById("dept_error").style.color="red";
        status=false;
     }
      else
       {
          document.getElementById("dept_error").innerHTML = "";
          status=true;
       }
     
     let r = document.forms["myForm"]["uni_name"].value;

     if (r == "") 
     {
        document.getElementById("uniname_error").innerHTML = "University name is required.";
        document.getElementById("uniname_error").style.color="red";
        status=false;
     }
      else
       {
          document.getElementById("uniname_error").innerHTML = "";
          status=true;
       }

    let s = document.forms["myForm"]["sid"].value;
     if (s == "") 
     {
        document.getElementById("sid_error").innerHTML = "Student ID is required.";
        document.getElementById("sid_error").style.color="red"; 
        status=false;
     }
      else
       {
          document.getElementById("sid_error").innerHTML = ""; 
          status=true;
       }
      return status;
    }

   </script>

    <script>

      function validateEmail()
       {
         const email = document.getElementById("email").value;
         const pattern = /^[a-zA-Z0-9._%+-]+@aiub\.edu$/;
         const isValid = pattern.test(email);
      
         document.getElementById('emailValidationMsg').textContent = isValid ? '' : 'Please enter a valid email address';
         document.getElementById('emailValidationMsg').style.color='red';

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
       document.getElementById('phoneValidationMsg').style.color='red';
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
