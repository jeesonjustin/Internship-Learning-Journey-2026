<?php
include "db.php";

/* Search */
if(isset($_GET["search"]) && $_GET["search"] != "")
{
    $search = $_GET["search"];

    $sql = "SELECT * FROM students
            WHERE course LIKE '%$search%'
            ORDER BY name ASC";
}

/* Filter by Age */
elseif(isset($_GET["age"]) && $_GET["age"] != "")
{
    $age = $_GET["age"];

    $sql = "SELECT * FROM students
            WHERE age = $age
            ORDER BY name ASC";
}

/* Default */
else
{
    $sql = "SELECT * FROM students
            ORDER BY name ASC";
}

$result = mysqli_query($conn, $sql);

/* Total Students */
$count_sql = "SELECT COUNT(*) AS total FROM students";
$count_result = mysqli_query($conn, $count_sql);
$count_row = mysqli_fetch_assoc($count_result);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Management System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h2>Student Management System</h2>

    <p class="total">
        Total Students :
        <strong><?php echo $count_row["total"]; ?></strong>
    </p>

    <a href="index.php" class="add-btn">
        + Register New Student
    </a>

    <div class="controls">

        <!-- Search Form -->

        <form method="GET">

            <input
                type="text"
                name="search"
                placeholder="Search by Course">

            <button type="submit">
                Search
            </button>

        </form>

        <!-- Filter Form -->

        <form method="GET">

            <select name="age">

                <option value="">Select Age</option>

                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>

            </select>

            <button type="submit">
                Filter
            </button>

        </form>

    </div>

    <table>

        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Course</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>

<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

    <td><?php echo $row["id"]; ?></td>

    <td><?php echo $row["name"]; ?></td>

    <td><?php echo $row["age"]; ?></td>

    <td><?php echo $row["course"]; ?></td>

    <td><?php echo $row["email"]; ?></td>

    <td>

        <a
        href="edit.php?id=<?php echo $row['id']; ?>"
        class="edit-btn">

        Edit

        </a>

    </td>

    <td>

        <a
        href="delete.php?id=<?php echo $row['id']; ?>"
        class="delete-btn"
        onclick="return confirm('Are you sure you want to delete this student?');">

        Delete

        </a>

    </td>

</tr>

<?php

}

?>

    </table>

</div>

</body>

</html>

