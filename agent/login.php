<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Gradient Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Body coding */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #000, #FF0000);
            /* Blue gradient */
        }
        /* Login container parent */
        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        /* Login form coding */
        .login-form {
            padding: 25px;
            border-radius: 15px;
            background: linear-gradient(to bottom, #000, #005bea);
            /* Gradient from light blue to dark blue */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Login form h2 coding */
        .login-form h2 {
            text-align: center;
            margin-bottom: 24px;
            background: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        /* login form controls code */
        .form-control {
            border-radius: 20px;
            margin-bottom: 10px;
            padding: 15px;
            border: none;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        /* botton code */
        .btn-primary {
            border-radius: 20px;
            padding: 10px 15px;
            border: none;
            background-image: linear-gradient(to right, #000 0%, #ff7eb3 100%);
            /* Pink gradient */
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(255, 118, 140, 0.4);
            
        }
        /* Botton hover code */
        .btn-primary:hover {
            background-image: linear-gradient(to right, #ff7eb3 0%, #ff758c 100%);
            transition: ease 3s;
        }

        /* Sidebar coding left */
        .login-sidebar {
            background-image: url(' https://fleetcouriers.com/wp-content/uploads/2020/09/AdobeStock_218614680-scaled.jpeg'), linear-gradient(to bottom, #000 30%, #a6c1ee 100%);
            background-size: cover, auto;
            min-height: 100vh;
            width: 100px;
        }

        /* signup button code */
        .signup {
            color: white; border-radius: 20px;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;    
            background: linear-gradient(600Deg, #667eea 30%, #764ba2 100%)
        }
          /* signup  hover button code */
        .signup:hover {
            color: #000;
            background: linear-gradient(to bottom, #3f5efb 10%, #fc466b 100%);
            transition : ease 3s;
        }
        /* help button code */
        .register{
            color: white;
            border-radius: 20px;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            background: linear-gradient(600Deg, #667eea 30%, #764ba2 100%)
        }
        /* help button hover code */
        .register:hover{
            color: #000;
            background: linear-gradient(to bottom, #3f5efb 10%, #fc466b 100%);
            transition: ease 2s;
        }
    </style>
</head>
<!-- html +php -->
<body>
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-lg-4 login-sidebar">
                <!-- Sidebar content if any -->
            </div>
            <div class="col-lg-8 login-container">
                <div class="login-form">
                    <h2>Masters Courier Service</h2>
                    <?php
                        if(isset($_GET['msg'])){
                            echo "<p style='color:white'>".$_GET['msg']."</p>";
                        }
                    ?>
                    <form action="loginProcess.php" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <a class="register" href="#">Help</a>
                    </div>
                    <br>
                    <a class="signup" href="#">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Add your scripts here -->
</body>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.12/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
