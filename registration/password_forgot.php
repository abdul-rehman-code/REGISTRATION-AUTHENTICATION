<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset_Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body style="background: gray;">
</head>
<body>
    <center>
    <div class="container mt-5" style="width: 70%;">
        <div class="mx-auto" >
    <h2 style="color: white;">Reset Password</h2>

<form action="password_reset_code.php" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
            <input type="hidden"  name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>" name="" id="">            
<div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" class="form-control" placeholder="Example:username@gmail.com" required>
            </div>
    <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="new_password" class="form-control" placeholder="Example:Abcd@123" required>
            </div>
     <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Example:Abcd@123" required>
            </div>
            
  <button type="submit" name="forgot" class="btn btn-primary w-100">Submit</button> <br><br>
</div>
</div>
</center>
</body>
</html>