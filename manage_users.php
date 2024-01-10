<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
     
    
    
    <style>
        /* Custom styles for sidebar and content */
        body {
            background-color: #f4f4f4;
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

        #Data_Table {
            width: 100%;
        }
        
        .table-responsive {
            max-height: 80vh;
            overflow-y: auto;
        }
        
        .table-responsive table {
            min-width: 600px;
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
    // Check if the user is logged in and their role is "admin"
    if (!isset($_SESSION["email"]) || $_SESSION["role"] !== "admin") {
        header('location:login.html');
        exit; // Stop executing the rest of the page
    }
    if($_SESSION["email"])
    {
    
    }
    else{
        header('location:login.html');
    }
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cms_database";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, first_name, last_name, email, password, role  FROM user_registeration";
    $result = $conn->query($sql);
    ?>

    <nav class="navbar navbar-dark bg-dark">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <h5 class="nav-link text-light"><span class="online-dot"></span>Hello, <?php echo $_SESSION['first_name'];?></h5>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h2 class="nav-link text-light">Welcome to the Admin Panel</h2>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/CMS/blog_posting.php">Add Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/CMS/manage_blogs.php">Blog Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/CMS/manage_users.php">User Management</a>
                            <ul class="sub-menu" id="userManagementSubMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://localhost/CMS/add_user.php">Add Users</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/CMS/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
    <?php
    if($_SESSION['role']==='admin')
    {
    ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
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
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <h2 class="nav-link text-light"><?php echo $_SESSION['email'];?></h2>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-light" href="http://localhost/CMS/admin_panel.php">
                                 <h2>Welcome to the User Panel</h2>
                            </a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/CMS/blog_posting.php">Add Blogs</a>
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

                <!-- Main content area -->
                <main id="content">
                    <!-- Table goes here (set the class "table-responsive" to make it scrollable) -->
                    <div class="table-responsive">
                        <table class="table table-striped" id="Data_Table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["first_name"]; ?></td>
                                    <td><?php echo $row["last_name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["role"]; ?></td>
                                    <td>
                                    <a href="delete_users.php?send_id=<?= $row["id"] ?>" class="delete-button">
                                         <button type="button" class="btn btn-danger" name="delete_button">Delete</button>
                                       </a>
                                        <a href="edit_users.php?send_id=<?= $row["id"] ?>"><button type="submit" class="btn btn-primary">Edit</button></a>
                                        <a href="view_users.php?send_id=<?= $row["id"] ?>"><button type="submit" class="btn btn-primary">View</button></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>

        

         <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('#Data_Table').DataTable();
        });
    </script>
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



    <!-- <script>
    document.addEventListener('click', function(event) {
        console.log("button clicked");
        if (event.target.classList.contains('delete-button')) {
            event.preventDefault(); // Prevent the default link behavior

            const userId = event.target.getAttribute('data-user-id');

            if (userId) {
                handleDelete(userId);
            }
        }
    });
</script>

<script>
    function handleDelete(userId) {
    fetch(`http://127.0.0.1:8000/delete/${userId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => {
        if (response.ok) {
            // User deleted successfully, you can perform any necessary UI updates here.
            console.log('User deleted successfully');
            // Optionally, you can redirect to a different page or refresh the user list.
        } else {
            throw new Error('Failed to delete user');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Optionally, you can display an error message to the user
    });
}

</script>
 -->
    </body>
</html>
