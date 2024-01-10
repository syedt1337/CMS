<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body {
            background-color: #f4f4f4;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar h2 {
            color: #fff;
            font-weight: bold;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            border: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-title {
            font-size: 24px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>

    <?php


session_start();
error_reporting(0);

if($_SESSION["email"])
{

}
else{
    header('location:login.html');
}






     $servername="localhost";
     $username="root";
     $password="";
     $dbname="cms_database";

     $conn= new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die("connection failed:". $conn->connect_error);
    }

    $btitle = $_POST["blog_title"];
    $bcontent = $_POST["blog_content"];
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder1 = "./titleImg/" . $filename;
    $folder2 = "./bodyImg/" . $filename;
    

    $sql="INSERT INTO  `blogs` SET
    `title` = '$btitle',
    `context` = '$bcontent',
    `title_image` = '$folder1 ',
    `body_image` = '$folder2',
    `publish_by` = '" . $_SESSION['role'] . "'";
    

$result = $conn->query($sql);
header("location:manage_blogs.php");
?>



<!-- <nav class="navbar navbar-expand-md navbar-dark  ">
        <div class="container">
            <h2 class="text-light mx-auto " ><?php echo $_SESSION['email'];?></h2>
        </div>
    </nav>
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <h2 class="text-light mx-auto " >Blog Posted!</h2>
    </div>
</nav>

<br>
<br>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Blogs</h3>
                        
                        <a href="http://localhost/CMS/manage_blogs.php" class="btn btn-primary">Manage blogs</a>
                    </div>
                </div>
            </div> 
     
 -->

</body>
</html>