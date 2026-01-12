

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body  style="background: gray;">

<center>
    <form action="signinphpfile.php" method="POST" >
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'empty') {
            echo "<p style='color:white'>Fill All Fields</p>";
        } 
        elseif ($_GET['error'] == 'wrong_password') {
            echo "<p style='color:white'>Incorrect password</p>";
        }
         elseif ($_GET['error'] == 'user_not_found') {
            echo "<p style='color:white'>User not found</p>";
        }
    }
    ?>
  <div class="form-group"  style="width: 70%;">
    <label for="exampleInputEmail1">UserName</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname" placeholder="Username">
     </div>
  <div class="form-group" style="width: 70%;">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-success" name="login">Login</button>
  <a href="password_reset.php" style="color: white;">Forgot password?</a>
  <a href="index.php" style="color: white;">Signup</a>
  
</form>
</center>


</body>
</html>


