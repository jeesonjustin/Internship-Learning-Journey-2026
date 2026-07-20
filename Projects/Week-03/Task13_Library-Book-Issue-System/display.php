<?php

include "db.php";

$sql = "
SELECT
    issued_books.issue_id,
    books.title,
    books.author,
    members.member_name,
    members.email,
    issued_books.issue_date

FROM issued_books

INNER JOIN books
ON issued_books.book_id = books.book_id

INNER JOIN members
ON issued_books.member_id = members.member_id
";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Issued Books | Library Book Issue System</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page-container">

    <!-- Header -->

    <div class="page-header">

        <a href="index.php" class="back-btn">

            <i class="fa-solid fa-arrow-left"></i>

            Dashboard

        </a>

        <h1>

            <i class="fa-solid fa-table-list"></i>

            Issued Books

        </h1>

        <p>

            View all books that have been issued to library members.

        </p>

    </div>

    <!-- Table Card -->

    <div class="table-card">

        <div class="table-header">

            <h3>

                <i class="fa-solid fa-book-open-reader"></i>

                Issued Books Records

            </h3>

            <p>

                Complete list of books currently issued to registered members.

            </p>

        </div>

        <div class="table-responsive">

            <table class="styled-table">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>
                            <span class="table-heading">
                                <i class="fa-solid fa-book"></i>
                                 Book
                            </span>
                        </th>

                        <th>
                            <span class="table-heading">
                                <i class="fa-solid fa-user-pen"></i>
                                Author
                            </span>
                        </th>

                        <th>
                        <span class="table-heading">
                            <i class="fa-solid fa-user"></i>
                                Member
                        </span>
                        </th>

                        <th>
                        <span class="table-heading">
                            <i class="fa-solid fa-envelope"></i>
                            Email
                        </span>
                        </th>

                        <th>
                        <span class="table-heading">
                            <i class="fa-solid fa-calendar-days"></i>
                            Issue Date
                        </span>
                        </th>

                        <th>
                        <span class="table-heading">
                            <i class="fa-solid fa-circle-check"></i>
                            Status
                        </span>
                        </th>

                    </tr>

                </thead>

                <tbody>

                <?php

                while($row=mysqli_fetch_assoc($result))
                {

                ?>

                <tr>

                    <td>

                        <?php echo $row['issue_id']; ?>

                    </td>

                    <td>

                        <strong>

                            <?php echo $row['title']; ?>

                        </strong>

                    </td>

                    <td>

                        <?php echo $row['author']; ?>

                    </td>

                    <td>

                    <span class="table-data">

                    <i class="fa-solid fa-user"></i>

                    <?php echo $row['member_name']; ?>

                    </span>

                    </td>

                    <td>

                    <span class="table-data">

                    <i class="fa-solid fa-envelope"></i>

                    <?php echo $row['email']; ?>

                    </span>

                    </td>

                    <td>

                        <?php echo date("d M Y", strtotime($row['issue_date'])); ?>

                    </td>

                    <td>

                        <span class="status">

                            <i class="fa-solid fa-circle-check"></i>

                            Issued

                        </span>

                    </td>

                </tr>

                <?php

                }

                ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<footer>

<p>

© 2026 Library Book Issue System |
ShiRah Info Tech Internship |
Developed by <strong>Jeeson Justin</strong>

</p>

</footer>

</body>
</html>