<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h2>Student Registration</h2>

    <form action="insert.php" method="POST">

        <label>Student Name</label>

        <input
        type="text"
        name="name"
        placeholder="Enter Student Name"
        required>

        <label>Age</label>

        <input
        type="number"
        name="age"
        placeholder="Enter Age"
        required>

        <label>Course</label>

        <input
        type="text"
        name="course"
        placeholder="Enter Course"
        required>

        <label>Email Address</label>

        <input
        type="email"
        name="email"
        placeholder="Enter Email Address"
        required>

        <button type="submit">
            Register Student
        </button>

    </form>

    <br>

    <a href="display.php" class="back-btn">
        View Registered Students
    </a>

</div>

</body>
</html>