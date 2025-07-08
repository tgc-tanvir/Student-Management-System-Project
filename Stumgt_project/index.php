<?php
include 'connection.php';

$students = [];

    if(isset($_GET['search']) && !empty(trim($_GET['search']))) 
      {
        $query = trim($_GET['search']);
        $sql = "SELECT * FROM student_add WHERE dept_name LIKE '%$query%' OR student_id = '$query'";
      } 

    else 
      {

        $sql = "SELECT * FROM student_add";

      }

    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
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
  <br>
  <img src="AIUB.jpg" alt="University Logo" style="width: 100%; height:400px; padding: 40px;">
  <br><br>
  <h1 style="text-align:center;">Student Management System</h1>
  <br><br>

  <div class="search-bar">
    <form action="index.php" method="GET" class="d-inline-block">
      <input type="text" name="search" placeholder="Search Department or ID" autocomplete="off" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
      <button type="submit" class="btn btn-secondary">Search</button>
    </form>
  </div>

  <br>
  <div class="myDiv text-center">
    <a href="add_student.php" class="btn btn-success">+ Add New Student</a>
  </div>

  <div class="container mt-4">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Department</th>
          <th>Student ID</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result && mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $id = $row['id'];
                $name = $row['firstname'] . ' ' . $row['lastname'];
                $email = $row['email'];
                $phone = $row['phone'];
                $dept = $row['dept_name'];
                $student_id = $row['student_id'];

                echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . htmlspecialchars($name) . '</td>
                        <td>' . htmlspecialchars($email) . '</td>
                        <td>' . htmlspecialchars($phone) . '</td>
                        <td>' . htmlspecialchars($dept) . '</td>
                        <td>' . htmlspecialchars($student_id) . '</td>
                        <td>
                          <a href="edit.php?editid=' . $id . '" class="btn btn-primary">Edit</a>
                          <a href="delete.php?deleteid=' . $id . '" onclick="return confirm(\'Are you sure you want to delete?\')" class="btn btn-danger">Delete</a>
                          <a href="show.php?showid=' . $id . '" class="btn btn-info">View</a>
                        </td>
                      </tr>';
            }
        } 
        else 
        {
            echo '<tr><td colspan="7" class="text-center">No students found.</td></tr>';
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="footer text-center mt-5">
    <p>&copy; 2025 Tanvir. All rights reserved.</p>
  </div>

  <script>
    document.getElementById("demo").style.color = "green";
  </script>
</body>
</html>
<?php mysqli_close($conn); ?>
