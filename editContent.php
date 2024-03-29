<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Content</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS */
        body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .form-container {
            background-color: #fff; /* White background for the form container */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group textarea {
            resize: vertical; /* Allow vertical resizing of textarea */
        }

        .btn-primary {
            background-color: #007bff; /* Blue primary button */
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 form-container">
            <form action="updateContent.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="ContentID" value="<?php echo $_GET['ContentID']; ?>">
                <div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="Title" value="<?php echo $_GET['Title']; ?>">
                </div>
                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea class="form-control" name="Description"><?php echo $_GET['Description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="Content_type">Content Type:</label>
                    <select class="form-control" name="Content_type">
                        <option value="article" <?php if ($_GET['Content_type'] === 'article') echo 'selected'; ?>>Article</option>
                        <option value="video" <?php if ($_GET['Content_type'] === 'video') echo 'selected'; ?>>Video</option>
                        <option value="infographic" <?php if ($_GET['Content_type'] === 'infographic') echo 'selected'; ?>>Infographic</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Link">Link:</label>
                    <input type="url" class="form-control" name="Link" value="<?php echo $_GET['Link']; ?>">
                </div>
                <div class="form-group">
                    <label for="Image">Image:</label>
                    <input type="file" class="form-control-file" name="Image">
                </div>
                <div class="form-group">
                    <label for="TalkPoints">Talk Points:</label>
                    <input type="text" class="form-control" name="TalkPoints" value="<?php echo $_GET['TalkPoints']; ?>">
                </div>
                <div class="form-group">
                    <label for="Extra">Extra:</label>
                    <input type="text" class="form-control" name="Extra" value="<?php echo $_GET['Extra']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update Content</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
