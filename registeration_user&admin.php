<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>

    <style>
       
        body {
           
           background-image: url('download.jpg');
           
           background-size: cover; 
           background-repeat: no-repeat; 
           background-attachment: fixed; 
           background-position: center; 

           
           background-color: rgba(0, 0, 0, 0.5); 

           
           
       }
        
        body {
            background-color: #f4f4f4;
        }
        /* .navbar {
            background-color: #343a40;
        } */
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
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="cms_database";

    $conn= new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)
    {
        die("connection failed:". $conn->connect_error);
    }
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $password= $_POST["password"];
    $role = $_POST["role"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $check_email = "SELECT * FROM `user_registeration` WHERE email = '$email'";
$check_email_query = $conn->query($check_email);

if ($check_email_query->num_rows > 0)
 {
    // Email already exists in the database
    echo '<script>alert("Email already exists. Please choose a different email.");</script>';
   
} 
else {
    $sql = "INSERT INTO `user_registeration` SET
    `first_name` = '$fname',
    `last_name` = '$lname',
    `email` = '$email',
    `password` = '$hashedPassword',
    `role` = '$role'";

    $result = $conn->query($sql);
    header("location: login.html");
}


    ?>
    <!-- <nav class="navbar navbar-expand-md navbar-dark ">
    <div class="container">
        <h2 class="text-dark mx-auto " >User Registered!</h2>
    </div>
</nav> -->

    
   
    <!-- <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Login</h3>
                        <a href="http://localhost/CMS/login.html" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div> -->
    
</body>
</html>