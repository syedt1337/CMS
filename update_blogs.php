<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms_database";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["blog_id"])) {
    
    $blog_id = $_POST["blog_id"];
    $title = $_POST["blog_title"];
    $title_image = $_FILES["fileToUpload"]["name"];
    $body = $_POST["blog_content"];
    $body_image = $_FILES["fileToUpload"]["name"];

    
    // Prepare and execute the SQL update statement
    $sql = "UPDATE blogs SET
    `title` = '$title',
    `title_image` = '$title_image',
    `context` = '$body',
    `body_image` = '$body_image'
    WHERE id = '$blog_id'";

   
    
    if ($conn->query($sql) === TRUE) {
       
        header( "Location: manage_blogs.php");
    } else {
        echo "Error updating blog post: " . $conn->error;
    }
}


// Close the database connection
$conn->close();
?>
