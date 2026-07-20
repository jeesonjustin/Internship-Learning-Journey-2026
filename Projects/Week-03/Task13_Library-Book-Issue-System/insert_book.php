<?php

include "db.php";

$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];

$sql = "INSERT INTO books(title, author, category)
        VALUES('$title', '$author', '$category')";

mysqli_query($conn, $sql);

echo "<script>
alert('Book Added Successfully!');
window.location.href='display.php';
</script>";

?>