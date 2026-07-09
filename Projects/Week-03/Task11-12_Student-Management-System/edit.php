<?php
include "db.php";

$id = $_GET["id"];

$sql = "SELECT * FROM students WHERE id = $id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h2>Update Student Details</h2>

    <form action="update.php" method="POST">

        <!-- Hidden ID -->
        <input
        type="hidden"
        name="id"
        value="<?php echo $row['id']; ?>">

        <label>Student Name</label>

        <input
        type="text"
        name="name"
        value="<?php echo $row['name']; ?>"
        required>

        <label>Age</label>

        <input
        type="number"
        name="age"
        value="<?php echo $row['age']; ?>"
        required>

        <label>Course</label>

        <input
        type="text"
        name="course"
        value="<?php echo $row['course']; ?>"
        required>

        <label>Email Address</label>

        <input
        type="email"
        name="email"
        value="<?php echo $row['email']; ?>"
        required>

        <button type="submit">
            Update Student
        </button>

    </form>

    <br>

    <a href="display.php" class="back-btn">
        ← Back to Student List
    </a>

</div>

</body>
</html>