<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" media="screen" href="./assets/styles/global.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="./assets/styles/login.css" />
  <title>Login</title>
</head>

<body>

  <div id="div-login-form" class="centering">
    <div id="div-login-form-child">
      <div id="div-logo">
        <img class="brand" src="assets/images/brand.svg" />
      </div>
      <div id="div-controls-container">
        <h4 class="h-login">Login</h4>
        <form action="login.php" method="POST" id="login-form">
          <input type="text" class="form-control login-input" id="username" name="username" placeholder="Username">

          <input type="password" class="form-control login-input" id="password" name="password" placeholder="Password">
          <input type="submit" name="auth" value="Login" class="btn btn-primary login-input" />
        </form>
        <?php
        $validationError = '';
        if(isset($_POST['auth']))
        {
          if ($_POST['auth']) {
          
            $user = $_POST['username'];
            $pass = $_POST['password'];
    
            if (strlen($user) < 4 || strlen($pass) < 4) {
              $validationError = "Invalid username and password!";
            }
            else{

              // go to db and check if username and password correct (using query) then redirect user to pets management page
              // 1- validate input
              $user = trim($user);  
              $user = htmlspecialchars($user);
              $pass = trim($pass);  
              $pass = htmlspecialchars($pass);

              //2- check in db
              require_once "./php_scripts/dbCon.php";
              $query = "SELECT * from vendors where username='$user' and password='$pass'";
            
              $results = mysqli_query($con,$query);
              $list = $results->fetch_all(MYSQLI_ASSOC);
              if(count($list) > 0 && count($list) == 1)
              {
                $_SESSION['id'] = $list[0]['id'];
                $_SESSION['username'] = $list[0]['username'];
                // redirect user to management page
                header("Location: petsm.php"); 
              }
              else{
                $validationError = "Invalid username or password";
              }
            }
    
              
            }
        }
      
        //



        ?>
        <span style="color:red;"><?php echo $validationError ?></span>
      </div>
    </div>
  </div>

  <script src="./scripts/common.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>