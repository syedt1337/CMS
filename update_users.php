
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Update the user record in the database
    $sql = "UPDATE user_registeration SET
            `first_name` = '$first_name',
            `last_name` = '$last_name',
            `email` = '$email',
            `password` = '$password'
            WHERE id = '$user_id'";

    if ($conn->query($sql) === TRUE) {
       
        header( "Location: manage_users.php");
    } else {
        echo "Error updating blog post: " . $conn->error;
    }
}
   


$conn->close();
?>


   