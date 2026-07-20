<?php

include "db.php";

$member_name = $_POST['member_name'];
$email = $_POST['email'];

$sql = "INSERT INTO members(member_name, email)
        VALUES('$member_name', '$email')";


if (mysqli_query($conn, $sql)) {
    echo "<script>
    alert('Member Added Successfully!');
    window.location.href='add_member.php';
    </script>";
} else {
    echo "<script>
    alert('Failed to Add Member!');
    window.history.back();
    </script>";
}
?>