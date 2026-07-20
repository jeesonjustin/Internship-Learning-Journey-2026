<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book | Library Book Issue System</title>

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
            <i class="fa-solid fa-book"></i>
            Add New Book
        </h1>

        <p>
            Register new books into the library database.
        </p>

    </div>


    <!-- Form Card -->

    <div class="form-card">

        <form action="insert_book.php" method="POST">

            <div class="form-group">

                <label>
                    <i class="fa-solid fa-book"></i>
                    Book Title
                </label>

                <input
                type="text"
                name="title"
                placeholder="Enter Book Title"
                required>

            </div>


            <div class="form-group">

                <label>
                    <i class="fa-solid fa-user-pen"></i>
                    Author
                </label>

                <input
                type="text"
                name="author"
                placeholder="Enter Author Name"
                required>

            </div>


            <div class="form-group">

                <label>
                    <i class="fa-solid fa-layer-group"></i>
                    Category
                </label>

                <select name="category" required>

                    <option value="">
                        Select Category
                    </option>

                    <option value="Programming">
                        Programming
                    </option>

                    <option value="Science">
                        Science
                    </option>

                    <option value="History">
                        History
                    </option>

                    <option value="Fiction">
                        Fiction
                    </option>

                </select>

            </div>


            <button type="submit" class="primary-btn">

                <i class="fa-solid fa-plus"></i>

                Add Book

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