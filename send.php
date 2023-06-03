<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include './config/database.php'; 

if(isset($_POST["submit"])){
    //from signup form
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword']; 

    $errorArray= [];

    if(empty($password)){
      array_push($errorArray, 'Password is required');
    }
    if(empty($cpassword)){
      array_push($errorArray, 'Confirm Password is required');
    } 
    //hhahahahahahahaha

    if($password !== $cpassword){
      array_push($errorArray, 'Password and Confirm Password do not match');
    }
    if (empty($_POST['name'])) {
      array_push($errorArray, 'Name is required');
    } 
    if (empty($_POST['email'])) {
      array_push($errorArray, 'Email is required');
    } 

    $query ="select * from user where email = '$email'";
    $invitationquery ="select * from invitation where email = '$email'";
    $result = mysqli_query($conn , $query);
    $invitationresult = mysqli_query($conn , $invitationquery);
    if(mysqli_num_rows($result)> 0 ){
      array_push($errorArray, 'User is already exist');
    }
    if(mysqli_num_rows($invitationresult)> 0 ){
      array_push($errorArray, 'An email invitation is sent already before! Please check your email again.');
    }
    if(count($errorArray)==0)
    {
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

      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $mail->addAddress($email);

      $mail->isHTML(true);

      $random_number = rand(1, 9999);
      $code = str_pad($random_number, 4, '0', STR_PAD_LEFT);
      

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
    }else{
      
      foreach($errorArray as $error){
        echo "<p style='color:red'>".$error."</p>";
      }
    }
    
}
?>