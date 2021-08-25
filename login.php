<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>
<body class="text-center">
    <div class="container">
    <div class="wrap col-md-6 offset-md-3">
        <h1 class="h3 mb-3">Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1" class="float-left">Email address</label> 
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="float-left">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
            </div>
                <input type="submit" class="btn btn-primary w-100 btn-lg mt-4 mb-4" name="login" value="Login">
                <div class="text-center">Don't have an account? <a href="register.php">Register Here</a></div>
        </form>
    </div>
</div>
<?php
        session_start();
        include('db.php');
        if($_POST['login']) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "SELECT * FROM `members` WHERE email='$email' LIMIT 1";
            $result = mysqli_query($db,$query);
            
            if(mysqli_num_rows($result) == 1) {
                foreach($result as $data) {
                    $db_username = $data['name'];
                    $db_email = $data['email'];
                    $db_password = $data['password'];
                }
                if($password == $db_password) {
                    $_SESSION['name'] = $db_username;
                    $_SESSION['email'] = $db_email;
                    $_SESSION['password'] = $db_password;
                    header('location:home.php');
                }else {
                    echo "Password incorrect!";
                }
            }else {
                echo "Please Register!";
            }
        }
    ?>

</body>
</html>