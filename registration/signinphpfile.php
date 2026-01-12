<?php
session_start();
include("db.php");

if (isset($_POST['login'])) {
    $uname = trim($_POST['uname']);
    $password = trim($_POST['password']);

    if (empty($uname) || empty($password)) {
        header("Location: signin.php?error=empty");
        exit();
    }

    // 1. Prepare query to find the user by username
    $sql = "SELECT * FROM reg WHERE uname = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // 2. Check if user exists
    if ($row = mysqli_fetch_assoc($result)) {
        // 3. Verify the hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['fname'] = $row['fname'];
            header("Location: home.php");
            exit();
        } else {
            header("Location: signin.php?error=wrong_password");
            exit();
        }
    } else {
        header("Location: signin.php?error=user_not_found");
        exit();
    }
}
?>