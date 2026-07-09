<?php

include "db.php";

/* Get Student ID */

$id = $_GET["id"];

/* Delete Query */

$sql = "DELETE FROM students
        WHERE id = $id";

/* Execute Query */

if(mysqli_query($conn, $sql))
{
?>

<script>

alert("Student Deleted Successfully!");

window.location.href = "display.php";

</script>

<?php
}
else
{
?>

<script>

alert("Unable to Delete Student!");

window.location.href = "display.php";

</script>

<?php
}

mysqli_close($conn);

?>