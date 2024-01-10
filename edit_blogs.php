<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
</head>
<body>
    <h2>Edit Blog Post</h2>
    <?php
// if (!isset($_SESSION["email"]) || $_SESSION["role"] !== "admin") {
    // header('location:login.html');
    // exit; // Stop executing the rest of the page
// }



    // Replace with your database connection code
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cms_database";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if an ID is provided for the blog post to be edited
    if (isset($_GET["send_id"])) {
        $blog_id = $_GET["send_id"];

        // Fetch the existing blog post data from the database
        $sql = "SELECT * FROM blogs WHERE id = $blog_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $blog_title = $row["title"];
            $blog_content = $row["context"];
            $title_image = $row["title_image"];
            $body_image = $row["body_image"];
        } else {
            echo "Blog post not found.";
            exit;
        }
    } else {
        echo "Invalid request.";
        exit;
    }
    ?>

<form method="POST" action="update_blogs.php" enctype="multipart/form-data">
    <!-- Blog Post ID (hidden field) -->
    <input type="hidden" name="blog_id" value="<?php echo $post_id; ?>">
    

        <!-- Blog Title -->
        <label for="blog_title">Blog Title:</label>
        <input type="text" name="blog_title" value="<?php echo $blog_title; ?>" required><br><br>

        <!-- Title Image -->
        <label for="titleImg">Title Image:</label><br>
        <img src="<?php echo $title_image; ?>" alt="Current Title Image" width="200"><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

        <!-- Blog Content -->
        <label for="blog_content">Blog Content:</label><br>
        <textarea name="blog_content" rows="10" cols="50" required><?php echo $blog_content; ?></textarea><br><br>

        <!-- Body Image -->
        <label for="bodyImg">Body Image:</label><br>
        <img src="<?php echo $body_image; ?>" alt="Current Body Image" width="200"><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

        <!-- Submit Button -->
        <input type="submit" value="Update">
    </form>
</body>
</html>
