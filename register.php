<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body class="text-center">
 
                
    <div class="container">
    <div class="wrap col-md-6 offset-md-3">
        <h1 class="h3 mb-3">Registration</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputName" class="float-left">User Name</label> 
                <input type="name" class="form-control" name="name" id="exampleInputName">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="float-left">Email address</label> 
                <input type="email" class="form-control" name="email" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="Password" class="float-left">Password</label>
                <input type="password" class="form-control" name="password" id="password" >
            </div>
            <div class="form-group">
                <label for="confirmPassword" class="float-left">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" >
            </div>
                <input type="submit" name="register" class="btn btn-primary w-100 btn-lg mt-4 mb-4" value="Register Now">
                <div class="text-center mb-3">Already have an account? <a href="login.php">Login Here</a></div>      
        </form>
        <?php
        session_start();
        include('db.php');
        if($_POST['register']) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            
                if($name !="" && $email !="" && $password !="" && $confirmPassword) {
                    if( $password == $confirmPassword){
                        $query = "INSERT INTO `members`
                        (
                        `name`,
                        `email`,
                        `password`)
                        VALUES ('$name', '$email', '$password')";
        
                        mysqli_query($db,$query);
                        $_SESSION['name'] = $name;
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        header('location:login.php');
                    }
                    else { echo '<div class="alert alert-primary" role="alert">
                     Password and Confirm Password are not same! </div>';
                  }
                }
                else { echo '<div class="alert alert-primary" role="alert">
                    All text fields need to fill! </div>';
                 }
        }          
        ?>   
    </div>
</div>
    
</body>
</html>