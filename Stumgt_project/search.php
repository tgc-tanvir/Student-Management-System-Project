<?php
include 'connection.php';

$query= trim($_GET['search']);
$sql = "SELECT * FROM `student_add` WHERE dept_name LIKE '%$query%'
        OR student_id LIKE '%$query%'";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
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

    <h3>Results:</h3>
    <div class="container">
    <table class="table table-bordered">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>University Name</th>
            <th>Student ID</th>
            <th>Address</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0):
            while($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['firstname']) ?></td>
            <td><?= htmlspecialchars($row['lastname']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['dept_name']) ?></td>
            <td><?= htmlspecialchars($row['uniname']) ?></td>
            <td><?= htmlspecialchars($row['student_id']) ?></td>
            <td><?= htmlspecialchars($row['student_address']) ?></td>
        </tr>
        <?php
            endwhile;
        else:
            echo "<tr><td colspan='8'>No results found.</td></tr>";
        endif;
        ?>
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

<?php
$conn->close();
?>
