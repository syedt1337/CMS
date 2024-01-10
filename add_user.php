 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
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
    if($_SESSION["email"] )
    {
        
        
    }
    else{
        
        print_r("test");
    }
    ?>

    
    <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-container">
                        <form method="POST" action="registeration_user&admin.php" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control" name="firstname" required>
                            </div>
    
                            <div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control" name="lastname" required>
                            </div>
    
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
    
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
    
                            <select name="role">
                            <option>ROLE</option>
                            <option>user</option>
                            <option>admin</option>
                            
                        </select>
                         
                        <br>
                        <br>
                            
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html> 

<!-- ********************************************************* -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <!-- <title>User Registration</title>
    <style> -->
        <!-- /* Your CSS styling here */ -->
    <!-- </style>
</head> -->

<!-- 
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <form id="registration-form">
                    

                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" required>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" required>
                        
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>

                        <select id="role" name="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>

                        <br><br>

                        <button type="button" class="btn btn-primary" onclick="handleClick()">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>  
function handleClick() {
        console.log("Clicked");
        // const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const dataToSend = {
            firstname: document.getElementById('firstname').value,
            lastname: document.getElementById('lastname').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,
            role: document.getElementById('role').value
        };

        console.log("Check data to send", dataToSend);
       

        fetch('http://127.0.0.1:8000/registered', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json', // Set the content type based on your needs
        },
            // headers:headers,
            body: JSON.stringify(dataToSend),
        }).then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Failed to register user');
            }
        }).catch(error => {
            console.error('Error:', error);
            // Optionally, you can display an error message to the user
        });
}
    </script>
  
</body>
</html>  -->
