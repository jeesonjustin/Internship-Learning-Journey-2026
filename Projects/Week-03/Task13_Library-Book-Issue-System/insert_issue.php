<?php

include "db.php";

$book_id = $_POST['book_id'];
$member_id = $_POST['member_id'];
$issue_date = $_POST['issue_date'];

$today = date("Y-m-d");

if($issue_date != $today)
{
    echo "<script>
    alert('Issue Date must be today.');
    window.history.back();
    </script>";
    exit();
}

$sql = "INSERT INTO issued_books(book_id, member_id, issue_date)
        VALUES('$book_id', '$member_id', '$issue_date')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
    alert('Book Issued Successfully!');
    window.location.href='display.php';
    </script>";
} else {
    echo "<script>
    alert('Failed to Issue Book!');
    window.history.back();
    </script>";
}

mysqli_close($conn);

?>