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

   
            background-color: #white; 

        }
        
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #202C39;
            color: #fff;
            padding-top: 20px;
        }

        #sidebar h2 {
            font-weight: bold;
            font-size: 18px;
        }

        #sidebar .nav-link {
            color: #fff;
        }

        #sidebar .nav-link:hover {
            background-color: #236B9B;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar h2 {
            color: #fff;
            font-weight: bold;
        }



        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 8px;
        }
        .btn {
            background-color: #202C39;
            border: none;
            color:white
        }
        .btn:hover {
            background-color: #236B9B;
        }
        .online-dot {
        position: relative;
        display: inline-block;
    }

    .online-dot::before {
        content: '';
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: green;
        border-radius: 50%;
        margin-right: 5px; /* Adjust the margin as needed to space it from the user's name or email */
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


?>

<?php
if($_SESSION['role']==='user')
{
?>
<nav class="navbar navbar-dark bg-dark">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <h5 class="nav-link text-light"><span class="online-dot"></span>Hello, <?php echo $_SESSION['first_name'];?></h5>
        </li>
    </ul>
</nav>
    <nav id="sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            
                        <li class="nav-item">
                            <a class="nav-link text-light" href="http://localhost/CMS/admin_panel.php">
                                 <h2>Welcome to the User Panel</h2>
                            </a>
                        </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="http://localhost/CMS/add_user.php">Add Users</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="http://localhost/CMS/blog_posting.php">Add Blogs</a>
                            </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">Blog Management</a>
                                  <div class="dropdown-menu" aria-labelledby="blogManagementDropdown">
                                     <a class="dropdown-item" href="http://localhost/CMS/blog_posting.php">Add Blogs</a>
                                     <a class="dropdown-item" href="http://localhost/CMS/manage_blogs.php">Manage Blogs</a>
                                   </div>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link active" href="http://localhost/CMS/manage_users.php">User Management</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" >Settings</a>
                                    <div class="dropdown-menu" aria-labelledby="blogManagementDropdown">
                                        <button class="dropdown-item" id="changeTextColor">change the color text</button>
                                    </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/CMS/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>

<?php            }
else
{
    ?>

    <nav class="navbar navbar-dark bg-dark">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <h5 class="nav-link text-light"><span class="online-dot"></span>Hello, <?php echo $_SESSION['first_name'];?></h5>
        </li>
    </ul>
</nav>
    <nav id="sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            
                            <li class="nav-item">
                                <a class="nav-link text-light" href="http://localhost/CMS/admin_panel.php">
                                   <h2>Welcome to the Admin Panel</h2>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">User Management</a>
                              <div class="dropdown-menu" aria-labelledby="blogManagementDropdown">
                                 <a class="dropdown-item" href="http://localhost/CMS/add_user.php">Add Users</a>
                                 <a class="dropdown-item" href="http://localhost/CMS/manage_users.php">Manage Users</a>
                               </div>
                        </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">Blog Management</a>
                                  <div class="dropdown-menu" aria-labelledby="blogManagementDropdown">
                                     <a class="dropdown-item" href="http://localhost/CMS/blog_posting.php">Add Blogs</a>
                                     <a class="dropdown-item" href="http://localhost/CMS/manage_blogs.php">Manage Blogs</a>
                                   </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" >Settings</a>
                                    <div class="dropdown-menu" aria-labelledby="blogManagementDropdown">
                                        <button class="dropdown-item" id="changeTextColor">change the color text</button>
                                    </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/CMS/logout.php">Logout</a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>

<?php
}
?>




    
            <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <form method="POST" action="blog_posted.php" enctype="multipart/form-data">
                        <!-- Blog Title -->
                        <div class="form-group">
                            <label for="blog_title">Blog Title:</label>
                            <input type="text" class="form-control" name="blog_title" required>
                        </div>

                        <!-- Title Image -->
                        <div class="form-group">
                            <label for="titleImg">Title Image:</label>
                            <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                        </div>

                        <!-- Blog Content -->
                        <div class="form-group">
                            <label for="blog_content">Blog Content:</label>
                            <textarea class="form-control" name="blog_content" rows="10" required></textarea>
                        </div>

                        <!-- Body Image -->
                        <div class="form-group">
                            <label for="bodyImg">Body Image:</label>
                            <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn ">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // JavaScript to handle changing text color
        document.getElementById("changeTextColor").addEventListener("click", function () {
            // Change the color of text in the sidebar
            var sidebarText = document.querySelectorAll("#sidebar .nav-link");
            sidebarText.forEach(function (element) {
                element.style.color = "black" ; // Change the color to red (you can change it to any color)
            });
        });
    </script>
</body>





</html>