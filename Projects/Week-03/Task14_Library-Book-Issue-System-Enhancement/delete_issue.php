<?php

include "db.php";

/*====================================
    GET ISSUE ID
====================================*/

$issue_id = $_GET['id'];

/*====================================
    DELETE QUERY
====================================*/

$sql = "DELETE FROM issued_books WHERE issue_id = '$issue_id'";

/*====================================
    EXECUTE QUERY
====================================*/

if(mysqli_query($conn, $sql))
{

    echo "
    <script>

        alert('Issue Record Deleted Successfully!');

        window.location='display.php';

    </script>
    ";

}
else
{

    echo "
    <script>

        alert('Failed to Delete Issue Record!');

        window.history.back();

    </script>
    ";

}

?>