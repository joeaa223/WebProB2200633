<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" >Education Content</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="adminMenu.php">Back to Admin Menu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <header class="bg-primary text-white p-4 mb-4 rounded-3">
            <h1 class="text-center">Upload Educational Content</h1>
        </header>
        <div class="upload-form-container bg-light p-4 rounded-3">
            <form id="uploadForm" action="uploadContentAdd.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="Title" class="form-label">Title:</label>
                    <input type="text" id="Title" name="Title" class="form-control" placeholder="Enter title" required>
                </div>
                <div class="mb-3">
                    <label for="Description" class="form-label">Description:</label>
                    <textarea id="Description" name="Description" class="form-control" rows="4" placeholder="Enter description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="TalkPoints" class="form-label">Talking Points:</label>
                    <textarea id="TalkPoints" name="TalkPoints" class="form-control" rows="4" placeholder="Enter talking points" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="Extra" class="form-label">Extra Facts:</label>
                    <textarea id="Extra" name="Extra" class="form-control" rows="4" placeholder="Enter extra facts" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="Image" class="form-label">Image:</label>
                    <input type="file" id="Image" accept=".png" name="Image" class="form-control-file" required>
                </div>
                <div class="mb-3">
                    <label for="Content_type" class="form-label">Content Type:</label>
                    <select id="Content_type" name="Content_type" class="form-select" required >
                        <option value="" disabled selected>Select content type</option>
                        <option value="article">Article</option>
                        <option value="video">Video</option>
                        <option value="infographic">Infographic</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Link" class="form-label">Link:</label>
                    <input type="url" id="Link" name="Link" class="form-control" placeholder="Enter link">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Upload</button>
            </form>
        </div>
    </div>
    <footer class="mt-5">
        <div class="social-links text-center">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <scipt src = "contentValidation.js"></script>
</body>
</html>
