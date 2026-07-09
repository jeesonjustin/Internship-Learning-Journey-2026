<?php

include "db.php";

/* Get Form Data */

$name   = $_POST["name"];
$age    = $_POST["age"];
$course = $_POST["course"];
$email  = $_POST["email"];

/* Insert Query */

$sql = "INSERT INTO students (name, age, course, email)
        VALUES ('$name', '$age', '$course', '$email')";

/* Execute Query */

if(mysqli_query($conn, $sql))
{
?>

<script>

alert("Student Registered Successfully!");

window.location.href = "display.php";

</script>

<?php
}
else
{
?>

<script>

alert("Registration Failed!");

window.history.back();

</script>

<?php
}

mysqli_close($conn);

?>