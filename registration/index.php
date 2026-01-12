<?php include 'db.php'; ?>
<?php
if (isset($_GET['error']) && $_GET['error'] == 'invalid_username') {
    echo "<p style='color:white'>
    Username must be at least 5 charactr abd contain letters and numbers.
    </p>";
}
if (isset($_GET['error']) && $_GET['error'] == 'invalid_name') {
    echo "<p style='color:white'>
    Only letters allowed.
    </p>";
}
if (isset($_GET['error']) && $_GET['error'] == 'invalid_phone') {
    echo "<p style='color:white'>
        Phone number must be exactly 11 digits and numbers only.
    </p>";
}
if (isset($_GET['error']) && $_GET['error'] == 'invalid_password') {
    echo "<p style='color:white'>
        Please enter the correct password formate.
    </p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body style="background: gray;">

<center>
    <div class="container mt-5" style="width: 70%;">
        <div class="mx-auto" >
    <h2 style="color: white;">Registration Form</h2>

<form action="signup.php" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="fname" class="form-control" placeholder="Example:Abdulrehman" required>
            </div>
    <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name="uname" class="form-control" placeholder="Example:username123" required>
            </div>
     <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Example:abcd@gmail.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="tel" name="phone" class="form-control" placeholder="Example:03027988098" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control"placeholder="Example:Abcd@123"  required>
            </div>
  <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button> <br><br>
</div>
</div>
</center>
</body>
</html>