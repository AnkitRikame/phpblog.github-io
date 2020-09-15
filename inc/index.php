<?php

$server = "localhost";
$user ="root";
$password ="";
$dbname = "phpblog";
$conn = mysqli_connect($server,$user,$password,$dbname);

if(!$conn){
    die("Connection failed".mysqli_connect_error());
}

if(isset($_POST["register"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($username != "" && $email != "" && $password != ""){
        $pwd_hash= sha1($password);
        $sql = "INSERT INTO users (username,email,password) VALUES('$username','$email','$password')";
        $query = $conn->query($sql);
        if($query){
            header('Location:login.php');
        }
        else{
            $error = "Failed to Register User";
        }
    }
    else{
           $error ="Failed to Register User";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <title>PHP BLOG </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">WELCOME TO ANKIT BLOG APPLICATION</a>
    </nav>


    <div class="container">

        <form class="form-horizontal" action="index.php" method="POST">
            <fieldset>
                <legend>REGISTER USER</legend>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="username" class="col-lg-2 col-form-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" name="username" class="form-control-plaintext"
                                    placeholder="Enter Username">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="email" class="col-lg-2 col-form-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" name="email" class="form-control-plaintext"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="password" class="col-lg-2 col-form-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" name="password" class="form-control-plaintext"
                                    placeholder="Enter Password">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-lg-10">

                                <input type="submit" name="register" value="Register" class="btn btn-primary">
                                <button type="reset" class="btn btn-default"> Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <?php if(isset($_POST["register"])):?>
                            <div class= "alert alert-dismissible alert-warning"></div>
                                 <div>
                                    <p><?php echo $error;?></p>
                                </div>
                                <?php endif;?>
                        </div>
                    </div>
                </div>
            
            </fieldset>
        </form>
    </div>
</body>
</html>