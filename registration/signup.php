<?php
include("db.php");

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   
if (!ctype_alpha($fname)) {
     header("Location: index.php?error=invalid_name");
    exit();
}
    if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $uname)) {
        header("Location: index.php?error=invalid_username");
        exit();
    }
   if (!preg_match('/^[0-9]{10,}$/', $phone)) {
    header("Location: index.php?error=invalid_phone");
    exit();
}

$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
if (!preg_match($pattern, $password)) {
    header("Location: index.php?error=invalid_password");
}
$query = "SELECT * FROM reg WHERE uname = '$uname' OR email = '$email' OR phone = '$phone'";

    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);
    if($row){
      if ($uname == $row['uname']) {
        echo "<script>
        alert('Username already exists!');
        window.location.href='index.php';
        </script>";
        exit();
      
    }

    elseif ($email == $row['email']) {

       echo "<script>
        alert('Email already exists!');
        window.location.href='index.php';
        </script>";
        
        }
        elseif ($phone == $row['phone']) {

      echo "<script>
        alert('Phone already exists!');
        window.location.href='index.php';
        </script>";
      
        }

        }


        else{
            $query = "INSERT INTO reg (fname, uname, email, phone, password)
              VALUES ('$fname', '$uname', '$email', '$phone', '$password')";

    if (mysqli_query($conn, $query)) {
         echo "<h1 style='color:white; background: green;'>Account Created Successfully!</h1>";
         echo '<label for="">Do You Want To Login?</label>';
        echo '<a href="signin.php"><button class="btn btn-primary">Login</button></a>';
    }
     else {
       echo "Error";
    }
        }

    
}
?>

