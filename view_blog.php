<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'send_id' parameter is set in the URL
if (isset($_GET['send_id'])) {
    $id = $_GET['send_id'];

    
    $sql = "SELECT * FROM blogs WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch the specific blog
        $row = $result->fetch_assoc();

        $title = $row["title"];
        $content = $row["context"];
        $titleImage = $row["title_image"];
        $bodyImage = $row["body_image"];

        echo '<div class="container mt-4 justify-content-center">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3 class="card-title">' . $title . '</h3>
                                <img src="' . $titleImage . '" alt="Title Image" width="200">
                                <p>' . $content . '</p>
                                <img src="' . $bodyImage . '" alt="Body Image" width="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    } else {
        echo "No blog found with the specified ID.";
    }
} else {
    echo "No 'send_id' parameter provided in the URL.";
}

$conn->close();
?>
