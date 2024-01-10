<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    
    <!-- Custom CSS -->
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
    
    ?>

    <?php
    $sql = "SELECT id, title, context, title_image, body_image, publish_by FROM blogs";
    $result = $conn->query($sql);
    ?>

    <?php
    if($_SESSION['role']==='admin')
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
                                <th>Blog Title</th>
                                <th>Title Image</th>
                                <th>Blog Content</th>
                                <th>Body Image</th>
                                <th>Publish By</th>
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
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><img src="<?php echo $row['title_image']; ?>" alt="Body Image"></td>
                                    <td><?php echo $row["context"]; ?></td>
                                    <td><img src="<?php echo $row['body_image']; ?>" alt="Body Image"></td>
                                    <td><?php echo $row["publish_by"]; ?></td>
                                    <td>
                                    <a  href="delete_blogs.php?send_id=<?= $row["id"] ?>" class="delete-button">
                                         <button type="button" class="btn btn-danger" name="delete_button">Delete</button>
                                       </a>
                                        <a href="edit_blogs.php?send_id=<?= $row["id"] ?>"><button type="submit" class="btn btn-primary">Edit</button></a>
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
</body>
</html>
                

















                        <!-- ************************************************* API CODE ************88-->
                        <!-- <tbody id="data-body">
                            <tr>
                        <script>
                            
function getBlogs()   
// converted old logic of get API into a re-usable funtion
// so we can call it whenever we need to check database
{


fetch('http://localhost:8000/manageblogs')
    .then(response => response.json())
    .then(data => {
        const dataBody = document.getElementById('data-body');
        // Loop through the data and add rows to the table
        data.forEach(row => {
            console.log(row)
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${row.id}</td>
                <td>${row.title}</td>
                <td>${row.title_image}</td>
                <td>${row.body}</td>
                <td>${row.body_image}</td>
                <td>${row.publish_by}</td>
                <td>
                    <a data-user-id="${row.id}" class="delete-button">
                        <button type="button" class="btn btn-danger" onclick="handleDelete(${row.id})">Delete</button>
                    </a>
                 </td>`;
            dataBody.appendChild(newRow);
            
        });
        
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}

getBlogs();
</script>
</tr>

   
                       
 

                                        

                                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
  -->
    <!-- jQuery and DataTables JS 
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    DataTables Initialization  -->
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


<!-- deleting data -->
<script>

function handleDelete(id) {
    console.log(`Delete button clicked for ID: ${id}`);
    deleteBlog(id);
}

function deleteBlog(id) {
        console.log("check");
        fetch(`http://127.0.0.1:8000/delete-blog/${id}`, 
        {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            },
        })
                .then(response => {
                    if (response.ok) {
                        // Blog deleted successfully, you can perform any necessary UI updates here.
                        console.log('Blog deleted successfully');
                        getBlogs();
                        // Optionally, you can redirect to a different page or refresh the blog list.
                    } else {
                        throw new Error('Failed to delete blog');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Optionally, you can display an error message to the user
                });
            }
    
   
</script>



</body>
</html>


<!-- function handleDelete(id) {
        console.log("Delete button clicked for ID: " + id);
        deleteBlog(id);
    } -->

<!-- <script>

        fetch('http://localhost:8000/manageblogs')
            .then(response => response.json())
            .then(data => {
                const dataBody = document.getElementById('data-body');
                // Loop through the data and add rows to the table
                data.forEach(row => {
                    console.log(row)
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td>${row.id}</td>
                        <td>${row.title}</td>
                        <td>${row.title_image}</td>
                        <td>${row.body}</td>
                        <td>${row.body_image}</td>
                        <td>${row.publish_by}</td>`;
                    dataBody.appendChild(newRow);
                    
                });
                
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script> -->

