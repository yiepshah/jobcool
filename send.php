<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include './config/database.php'; 

if(isset($_POST["submit"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'shahirayp@gmail.com';
    $mail->Password = 'ccimeecfxsibvqzz';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port=587;

    $mail->setFrom('shahirayp@gmail.com','Jobcool Support Team');

    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $mail->addAddress($email);

    $mail->isHTML(true);

    $random_number = rand(1, 9999);
    $code = str_pad($random_number, 4, '0', STR_PAD_LEFT);
    $name = $_POST['name'];
    

    $mail->Subject = "Account Activation of Jobcool";
    $mail->Body = "
    <label>Activation Link:</label><a href='http://localhost/jobcool/activation.php'>Link</a>
    <label>Activation Code:$code</label>
    ";
    


    
    try{
        $mail->send();
      }catch(Exception $e){
        echo "An error happens";
      }finally{
        $query = "insert into invitation(email,code,password,name) values('$email','$code','$password','$name')";
        mysqli_query($conn, $query);
      }

    echo "
    <script>
        alert('Activation Code is sent to your email successfully')
    </script>
    ";
    header("location:login.php");
}
?>