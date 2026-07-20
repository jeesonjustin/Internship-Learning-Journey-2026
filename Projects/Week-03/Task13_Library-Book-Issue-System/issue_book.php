<?php

include "db.php";

// Fetch Books
$bookQuery = "SELECT * FROM books";
$bookResult = mysqli_query($conn, $bookQuery);

// Fetch Members
$memberQuery = "SELECT * FROM members";
$memberResult = mysqli_query($conn, $memberQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book | Library Book Issue System</title>

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
            <i class="fa-solid fa-book-open-reader"></i>
            Issue Book
        </h1>

        <p>
            Assign a library book to a registered member.
        </p>

    </div>

    <!-- Form Card -->

    <div class="form-card">

        <form action="insert_issue.php" method="POST">

            <!-- Book -->

            <div class="form-group">

                <label>

                    <i class="fa-solid fa-book"></i>

                    Select Book

                </label>

                <select name="book_id" required>

                    <option value="">Choose a Book</option>

                    <?php
                    while($book = mysqli_fetch_assoc($bookResult))
                    {
                    ?>

                    <option value="<?php echo $book['book_id']; ?>">

                        <?php echo $book['title']; ?>

                    </option>

                    <?php
                    }
                    ?>

                </select>

            </div>

            <!-- Member -->

            <div class="form-group">

                <label>

                    <i class="fa-solid fa-user"></i>

                    Select Member

                </label>

                <select name="member_id" required>

                    <option value="">Choose a Member</option>

                    <?php
                    while($member = mysqli_fetch_assoc($memberResult))
                    {
                    ?>

                    <option value="<?php echo $member['member_id']; ?>">

                        <?php echo $member['member_name']; ?>

                    </option>

                    <?php
                    }
                    ?>

                </select>

            </div>

            <!-- Issue Date -->

            <div class="form-group">

                <label>

                    <i class="fa-solid fa-calendar-days"></i>

                    Issue Date

                </label>

                <input
                type="date"
                name="issue_date"
                value="<?php echo date('Y-m-d'); ?>"
                min="<?php echo date('Y-m-d'); ?>"
                max="<?php echo date('Y-m-d'); ?>"
                required>

            </div>

            <!-- Button -->

            <button type="submit" class="primary-btn">

                <i class="fa-solid fa-paper-plane"></i>

                Issue Book

            </button>

        </form>

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