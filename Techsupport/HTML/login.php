<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title></title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<?php
include ("include/config.inc.php");
session_start();

  if(isset($_SESSION["username"])){
    header("Location: {$hostname}/Template/dashboard.php");
  }

?>
<style>
  .define{
    text color
  }
  
  </style>
<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="assets/img/logo.png" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Welcome to Ways Software</p>
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label class="form-control-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" name="password"
                                            id="password">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>

                                <input class="btn btn-lg btn-block btn-primary w-100" type="submit" value="Login" name="login" />

                            </form>

                            <?php
                          if(isset($_POST['login'])){
                            include ("include/config.inc.php");
                            if(empty($_POST['username']) || empty($_POST['password'])){
                              echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                              die();
                            }else{
                              $username = mysqli_real_escape_string($con, $_POST['username']);
                              $password = mysqli_real_escape_string($con, $_POST['password']);

                              $sql = "SELECT  username FROM user_master WHERE username = '{$username}' AND password= '{$password}'";

                              $result = mysqli_query($con, $sql);
                              if(mysqli_num_rows($result)> 0)
                              {
                                while($row = mysqli_fetch_assoc($result)){
                                  session_start();
                                  $_SESSION["username"] = $row['username'];
                                  $_SESSION["id"] = $row['id'];
                                  
                                  header("Location: dashboard.php");
                                }

                              }else{
                                  
                              echo '<div class="danger">Invalid username password combination !</div>';
                            }
                          }
                          }
                        ?>

                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>