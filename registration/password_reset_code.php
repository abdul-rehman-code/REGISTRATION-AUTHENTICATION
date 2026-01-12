<?php
session_start();
include("db.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token)
{

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'hafizabdulrehman6815@gmail.com';
    $mail->Password   = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('hafizabdulrehman6815@gmail.com', 'Testing');
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $email_template = "
        <h1>Hello $get_name</h1>
        <p>You are receiving this email because we received a password reset request.</p>
        <a href='http://localhost/registration/password_forgot.php?token=$token&email=$get_email'>Click Here to Reset Password</a>";


    $mail->Subject = 'Password Reset Notification';
    $mail->Body    = $email_template;
    $mail->send();
}
// reset link
if(isset($_POST['password_reset'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $chkmail = "SELECT fname, email FROM reg WHERE email='$email' LIMIT 1";
    $run = mysqli_query($conn, $chkmail);

    if(mysqli_num_rows($run) > 0){
        $row = mysqli_fetch_array($run);
        $get_name = $row['fname'];
        $get_email = $row['email'];

        $update_token = "UPDATE reg SET ver_token = '$token' WHERE email = '$get_email' LIMIT 1";
        mysqli_query($conn, $update_token);

        send_password_reset($get_name, $get_email, $token);
        echo "Check Your Email For Reset Link " . $get_name;
    } else {
        echo "No email found";
    }
}





// Updating  password via form
if(isset($_POST['forgot'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $password_token = mysqli_real_escape_string($conn, $_POST['password_token']);

    if(!empty($password_token)) {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password)) {
            
            $check_token = "SELECT ver_token, token_created_at FROM reg 
            WHERE ver_token= '$password_token' AND email='$email' LIMIT 1";
            $run = mysqli_query($conn, $check_token);

            if(mysqli_num_rows($run) > 0) {
                $row = mysqli_fetch_array($run);
                $token_time = strtotime($row['token_created_at']);
                $current_time = time();
                $diff = $current_time-$token_time;
                if($diff > 120){
                    ///time exprie weala code dalna hy
                    $exp_query = "UPDATE reg SET ver_token =  NULL WHERE email = '$email'";
                    mysqli_query($conn, $exp_query);
                    echo "This link has expired. 2 minutes limit. Please request a new one.";
                    echo '<a href="sipassword_reset">Reset</a>';
                    
                
                }
                else{
                    if($new_password == $confirm_password) {
                   
                    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $update_password = "UPDATE reg SET password = '$hash_password',
                     ver_token = NULL WHERE ver_token= '$password_token' LIMIT 1";
                    $update_password_run = mysqli_query($conn, $update_password);

                    if($update_password_run) {
                        echo "Password changed successfully! You can now login.";
                        echo "Your reset link has expired for security reasons.<br><br>";
                        echo '<a href="login.php"><button>Login Now</button></a>';
                    }
                     else {
                        echo "Something went wrong during password reset.";
                    }
                }
                 else {
                    echo "Passwords did not match.";
                }
                }
            }
             else {
                echo "Token Expired.";
            }
        }
         else {
            echo "All fields are required.";
            }
        } 
    else {
        echo "No token found.";
     }
}
?>

