if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
        header('Location: login.html'); // Redirect to the login page or another appropriate page
        exit();
    }



    $secret_code = 'http://localhost/CMS/admin_panel.php'; 
    if (!$get_code == $secret_code) { 
        header('Location: 404.php'); //redirect to 404.php page if secret code donot match. 
    }



    if($_SESSION["email"] || $_SESSION["password"])
{
    
}
else{
    header('location:login.html');
}


    ****************************login_user&admin.php************************************************

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
            
            /* background-image: url('download.jpg'); */
            
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
  
  session_start();
  


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];    //receive email from login.html
    $password = $_POST["password"]; //receive password form login.html

    // Check if it's a user login
    $user_sql = "SELECT * FROM user_registeration WHERE email='$email' AND password='$password'";
    $user_result = $conn->query($user_sql);

    if ($user_result === false) {
        die("Error executing user SQL query: " . $conn->error);
    }

    $user_row = $user_result->fetch_assoc();
    
    // Check if it's an admin login
    $admin_sql = "SELECT * FROM admin_registeration WHERE email='$email' AND password='$password'";
    $admin_result = $conn->query($admin_sql);

    if ($admin_result === false) {
        die("Error executing admin SQL query: " . $conn->error);
    }

    $admin_row = $admin_result->fetch_assoc();

    if ($user_row) {
        $_SESSION['email'] = $user_row['email'];
        $_SESSION['role'] = $user_row['role'];
        // Regular user login
        header("Location: blog_posting.php"); 
        exit();

        
    }
        
         elseif ($admin_row) {
            $_SESSION['email'] = $admin_row['email'];
            $_SESSION['role'] = $admin_row['role']; // Save the admin's email in a session variable
        // Admin login
        header("Location: admin_panel.php"); 
        exit();
    } else {
       
        echo "Wrong username or password";
    }
}

?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Create a Blog</h3>
                        <a href="http://localhost/CMS/blog_posting.html" class="btn btn-primary">Create a blog</a>
                    </div>
                </div>
            </div>
    <?php
            // header("Location: http://localhost/employee_management/dashboard/main_dashboard.php?username=$storedUsername&email=$storedUseremail");
            
        
    
    
    ?>


</body>
</html>



*********************************************registeration_user&admin.php*****************************8

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

    if ($role === 'user')
    {

    $user_sql= "INSERT INTO `user_registeration` SET
    `first_name`= '$fname',
    `last_name`= '$lname',
    `email`    = '$email',
    `password` = '$password',
    `role`     = '$role'";

    $user_result = $conn->query($user_sql);
    }
    elseif($role ==='admin')
    {
        $admin_sql= "INSERT INTO `admin_registeration` SET
        `first_name`= '$fname',
        `last_name`= '$lname',
        `email`    = '$email',
        `password` = '$password',
        `role`     = '$role'";
    
        $admin_result = $conn->query($admin_sql);
    }
    else{
        print_r("registeration failed");
    }
    
    print_r("registeration successfully");
    ?>
    <nav class="navbar navbar-expand-md navbar-dark ">
    <div class="container">
        <h2 class="text-dark mx-auto " >User Registered!</h2>
    </div>
</nav>

    
   
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Login</h3>
                        <a href="http://localhost/CMS/login.html" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
    
</body>
</html>


****************************************loin_user&admin.php****************************************
if ( $row["email"] === 'email' || $row['password'] ==='password' || $row["role"] === 'user'){
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['password'] = $row['password'];
        
        
        header("Location: blog_posting.php"); 
        exit();

        
    }
        
    elseif ($row['email'] ==='email' || $row['password'] ==='password' || $row["role"] === 'admin') {
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role']; // Save the admin's email in a session variable// Admin login
            $_SESSION['password'] = $row['password'];
        header("Location: admin_panel.php"); 
        exit();
    } else {
       
        echo "Wrong username or password";
    }










    <!-- <nav class="navbar navbar-expand-md navbar-dark  ">
            <div class="container">
                <h2 class="text-light mx-auto " ><?php echo $_SESSION['email'];?></h2>
            </div>
        </nav> -->





        <!-- //code for search bar -->
<?php
$search_users="";
if(!isset($_POST['search_users']) && ($_POST['search_users'] !=''))
{
      $search_users=$_POST['search_users'];
      $searchsql = "SELECT id, first_name, last_name, email, password FROM users_registeration WHERE last_name LIKE '%$search_users%' OR email LIKE '%$search_users%'";
}  
else
{
$searchsql = "SELECT id, first_name, last_name, email, password FROM users_registeration";
}
$search_result = $conn->query($searchsql);
?>

<!-- code for search box -->
            <form method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search_users" placeholder="Search by last name name or email" value="<?php echo $search_users; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

<!-- *************************************************** -->

<?php                                    // Handle search form submission using php
$search_blogs = "";
if (isset($_POST['search_blogs']) && $_POST['search_blogs'] != '') {
    $search_blogs = $_POST['search_blogs'];
    $searchsql = "SELECT id, title, context, title_image, body_image, publish_by FROM blogs WHERE title LIKE '%$search_blogs%' OR publish_by LIKE '%$search_blogs%'";
} else {
    $searchsql = "SELECT id, title, context, title_image, body_image, publish_by FROM blogs";
}

$result = $conn->query($searchsql);
               ?>



<!-- Search Form -->
<form method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search_blogs" placeholder="Search by title name or author" value="<?php echo $search_blogs; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>


