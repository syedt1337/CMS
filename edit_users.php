<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Edit User</title>
    
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cms_database";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['send_id'])) {
        $user_id = $_GET['send_id'];

        // Retrieve user data based on the user ID
        $sql = "SELECT id, first_name, last_name, email, password FROM user_registeration WHERE id = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $password = $row['password'];

            // Display the form with pre-filled user data



            ?>
            <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-4">

                <form action="update_users.php" method="POST" class="mx-auto col-10 col-md-8 col-lg-6">

                <nav class="navbar navbar-expand-md navbar-dark ">
                    <div class="container">
                        <h2 class="text-light mx-auto " >Edit User</h2>
                    </div>
                </nav>
                <br><br>
                    <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname"  class="form-control" value="<?php echo $first_name; ?>" required><br><br>

                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" class="form-control" value="<?php echo $last_name; ?>" required><br><br>

                    <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required><br><br>

                <label for="password">Password:</label>
                <input type="password" name="password" value="<?php echo $password; ?>" required><br><br>


                   
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

            
            
            <?php
        } else {
            echo "User not found.";
        }
    } else {
        echo "Invalid request.";
    }

    $conn->close();
    ?>
</body>
</html>
