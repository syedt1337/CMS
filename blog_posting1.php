<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posting</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cms_database";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $btitle = $_POST["blog_title"];
    $bcontent = $_POST["blog_content"];

    // Handle file uploads for title image
    $titleFilename = $_FILES["titleImg"]["name"];
    $titleTempname = $_FILES["titleImg"]["tmp_name"];
    $titleFolder = "./titleImg/" . $titleFilename;

    if (move_uploaded_file($titleTempname, $titleFolder)) {
        // File upload successful
    } else {
        echo "Error uploading title image.";
    }

    // Handle file uploads for body image
    $bodyFilename = $_FILES["bodyImg"]["name"];
    $bodyTempname = $_FILES["bodyImg"]["tmp_name"];
    $bodyFolder = "./bodyImg/" . $bodyFilename;

    if (move_uploaded_file($bodyTempname, $bodyFolder)) {
        // File upload successful
    } else {
        echo "Error uploading body image.";
    }

    $sql = "INSERT INTO `blogs` (`title`, `context`, `title_image`, `body_image`) VALUES ('$btitle', '$bcontent', '$titleFolder', '$bodyFolder')";

    if ($conn->query($sql) === TRUE) {
        echo "Success! Blog post has been created.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>
</body>
</html>
