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
            background-color: #008CBA;
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
            background-color: #4AA44D;
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
    </style>
</head>

<body>
<nav id="sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h2 class="nav-link text-light"><?php echo $_SESSION['email'];?></h2>
                        </li>
                        <li class="nav-item">
                            <h2 class="nav-link text-light">Welcome to the Admin Panel</h2>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/CMS/manage_blogs.php">Blog Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/CMS/manage_users.php">User Management</a>
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

</body>
</html>