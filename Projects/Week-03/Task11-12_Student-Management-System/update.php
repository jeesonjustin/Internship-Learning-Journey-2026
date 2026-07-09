<?php

include "db.php";

/* Get Updated Form Data */

$id     = $_POST["id"];
$name   = $_POST["name"];
$age    = $_POST["age"];
$course = $_POST["course"];
$email  = $_POST["email"];

/* Update Query */

$sql = "UPDATE students
        SET
            name='$name',
            age='$age',
            course='$course',
            email='$email'
        WHERE id=$id";

/* Execute Query */

if(mysqli_query($conn, $sql))
{
?>

<script>

alert("Student Updated Successfully!");

window.location.href = "display.php";

</script>

<?php
}
else
{
?>

<script>

alert("Student Update Failed!");

window.history.back();

</script>

<?php
}

mysqli_close($conn);

?>