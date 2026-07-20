<?php

include "db.php";
$sqlBooks = "SELECT COUNT(*) AS total_books FROM books";
$resultBooks = mysqli_query($conn, $sqlBooks);
$rowBooks = mysqli_fetch_assoc($resultBooks);
$totalBooks = $rowBooks['total_books'];

$sqlMembers = "SELECT COUNT(*) AS total_members FROM members";
$resultMembers = mysqli_query($conn, $sqlMembers);
$rowMembers = mysqli_fetch_assoc($resultMembers);
$totalMembers = $rowMembers['total_members'];

$sqlIssuedBooks = "SELECT COUNT(*) AS total_issued_books FROM issued_books";
$resultIssuedBooks = mysqli_query($conn, $sqlIssuedBooks);
$rowIssuedBooks = mysqli_fetch_assoc($resultIssuedBooks);
$totalIssuedBooks = $rowIssuedBooks['total_issued_books'];

$search = "";

if(isset($_GET['search']))
{
    $search = trim($_GET['search']);
}

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

if($search != "")
{
    $sql .= "
    WHERE
    books.title LIKE '%$search%'
    OR members.member_name LIKE '%$search%'
    ";
}

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

    <!-- Dashboard Statistics -->

    <div class="statistics-container">

    <!-- Total Books -->

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-book"></i>
        </div>

        <div class="stat-content">

            <h2><?php echo $totalBooks; ?></h2>

            <p>Total Books</p>

        </div>

    </div>

    <!-- Total Members -->

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-users"></i>
        </div>

        <div class="stat-content">

            <h2><?php echo $totalMembers; ?></h2>

            <p>Total Members</p>

        </div>

    </div>

    <!-- Total Issued Books -->

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-book-open-reader"></i>
        </div>

        <div class="stat-content">

            <h2><?php echo $totalIssuedBooks; ?></h2>

            <p>Issued Books</p>

        </div>

    </div>

    </div>

    <!-- Search Section -->

<div class="search-card">

    <form action="" method="GET" class="search-form">

        <input
            type="text"
            name="search"
            class="search-input"
            placeholder="Search by Book Title or Member Name..."
            value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

        <button type="submit" class="search-btn">
            <i class="fa-solid fa-magnifying-glass"></i>
            Search
        </button>

        <a href="display.php" class="reset-btn">
            <i class="fa-solid fa-rotate-left"></i>
            Reset
        </a>

    </form>

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
                            <i class="fa-solid fa-gears"></i>
                            Action
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

                        <div class="action-buttons">

                            <a href="edit_issue.php?id=<?php echo $row['issue_id']; ?>" class="edit-btn">

                                <i class="fa-solid fa-pen-to-square"></i>

                                Edit

                            </a>

                            <a
                            href="delete_issue.php?id=<?php echo $row['issue_id']; ?>"
                            class="delete-btn"

                            onclick="return confirm('Are you sure you want to delete this issue record?');">

                            <i class="fa-solid fa-trash"></i>

                            Delete

                            </a>

                        </div>

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