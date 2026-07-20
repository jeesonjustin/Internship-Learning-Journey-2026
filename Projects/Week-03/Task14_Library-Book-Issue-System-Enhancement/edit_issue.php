<?php

include "db.php";



$issue_id = $_GET['id'];



$sqlIssue = "SELECT * FROM issued_books WHERE issue_id = $issue_id";
$resultIssue = mysqli_query($conn, $sqlIssue);
$issue = mysqli_fetch_assoc($resultIssue);



$sqlBooks = "SELECT * FROM books";
$resultBooks = mysqli_query($conn, $sqlBooks);



$sqlMembers = "SELECT * FROM members";
$resultMembers = mysqli_query($conn, $sqlMembers);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Issue | Library Book Issue System</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page-container">

    <!-- Header -->

    <div class="page-header">

        <a href="display.php" class="back-btn">

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>

        <h1>

            <i class="fa-solid fa-pen-to-square"></i>

            Edit Issued Book

        </h1>

        <p>

            Update the issued book details.

        </p>

    </div>

    <!-- Form Card -->

    <div class="form-card">

        <form action="update_issue.php" method="POST">

            <!-- Hidden Issue ID -->

            <input
                type="hidden"
                name="issue_id"
                value="<?php echo $issue['issue_id']; ?>">

            <!-- Book -->

            <div class="form-group">

                <label>

                    <i class="fa-solid fa-book"></i>

                    Book

                </label>

                <select name="book_id" required>

                    <?php

                    while($book=mysqli_fetch_assoc($resultBooks))
                    {

                    ?>

                    <option
                        value="<?php echo $book['book_id']; ?>"

                        <?php

                        if($book['book_id']==$issue['book_id'])
                        {
                            echo "selected";
                        }

                        ?>

                    >

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

                    Member

                </label>

                <select name="member_id" required>

                    <?php

                    while($member=mysqli_fetch_assoc($resultMembers))
                    {

                    ?>

                    <option
                        value="<?php echo $member['member_id']; ?>"

                        <?php

                        if($member['member_id']==$issue['member_id'])
                        {
                            echo "selected";
                        }

                        ?>

                    >

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
                    value="<?php echo $issue['issue_date']; ?>"
                    required>

            </div>

            <!-- Buttons -->

            <div class="form-buttons">

                <button type="submit" class="submit-btn">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Update Issue

                </button>

                <a href="display.php" class="cancel-btn">

                    <i class="fa-solid fa-xmark"></i>

                    Cancel

                </a>

            </div>

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