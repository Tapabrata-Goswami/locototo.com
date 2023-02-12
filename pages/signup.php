<?php

    //Admin id & pass
    $admin_email_real = 'root@locototo.com';
    $admin_pass_real = '123!@#';

    //Database details
    $servername= "localhost";
    $username ="root";
    $password = "";
    $database = "locototo";
    
    // conection to database
    $database_connection = mysqli_connect($servername, $username, $password,$database);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>signup</title>
</head>

<style>
    html {
        height: 100%;
    }

    body {
        height: 100%;
    }

    .global-container {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fbebed;
    }

    form {
        padding-top: 10px;
        font-size: 14px;
        margin-top: 30px;
    }

    .card-title {
        font-weight: 300;
    }

    .btn {
        font-size: 14px;
        margin-top: 20px;
    }

    .login-form {
        width: 330px;
        margin: 20px;
    }

    .sign-up {
        text-align: center;
        padding: 20px 0 0;
    }

    .alert {
        margin-bottom: -30px;
        font-size: 13px;
        margin-top: 20px;
    }
</style>

<?php
// Password Checking and Vladating
if(!$database_connection){
    echo "Sorry! Database face error.";
}else{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $admin_email = $_POST['email'];
        $admin_pass= $_POST['password'];

        if($admin_email == NULL or $admin_pass == NULL){
            echo "Fill All Fileds";
        }else{
            if($admin_email == $admin_email_real and $admin_pass == $admin_pass_real){
                header('Location: admin.php');
            }else{
                echo "Sorry! Wrong id & pass.";
            }
        }
    }
}
?>

<body>
    <div class="pt-5">
        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h3 class="card-title text-center">Locototo Backend Admin</h3>
                    <div class="card-text">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Enter Email address </label>
                                <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Enter Password </label> 
                                <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> Sign in </button>
                        </form>
                        <div>
                            <span style="width:100%; text-align:center;">
                                <a style="text-decoration: none; font-size:16px; font-weight: 600; text-align:center;" href="index.php">Go to Home page</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <span><?php $t = date('Y'); echo htmlspecialchars($t);?>@ copyright.</span>
    </footer>
</body>

</html>