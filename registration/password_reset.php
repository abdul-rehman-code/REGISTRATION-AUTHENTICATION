<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
   <center>
    <form action="password_reset_code.php" method="POST">
    <div class="mb-3" style="width: 70%;">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required><br>
            <button type="submit" name="password_reset" class="btn btn-primary w-100">Reset</button> <br><br>
            </div>
  <!-- Email: <input type="email" name="email" required> -->
  <!-- <button type="submit" name="password_reset">Reset</button> -->
  
</form>
   </center>


</body>
</html>