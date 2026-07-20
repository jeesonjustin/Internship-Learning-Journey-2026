<?php

include "db.php";


$issue_id   = $_POST['issue_id'];
$book_id    = $_POST['book_id'];
$member_id  = $_POST['member_id'];
$issue_date = $_POST['issue_date'];


$sql = "UPDATE issued_books
SET
book_id = '$book_id',
member_id = '$member_id',
issue_date = '$issue_date'
WHERE issue_id = '$issue_id'";



if(mysqli_query($conn, $sql))
{

    echo "
    <script>

        alert('Issue Record Updated Successfully!');

        window.location='display.php';

    </script>
    ";

}
else
{

    echo "
    <script>

        alert('Failed to Update Issue Record!');

        window.history.back();

    </script>
    ";

}

?>