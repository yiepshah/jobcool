<?php

use function PHPSTORM_META\sql_injection_subst;

include 'inc/header.php'; ?>
<?php


if(isset($_POST['submit']))
{
  
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($email)&& !empty($password))
    {//read from database

     // $sql = "INSERT INTO (user_name, password) VALUES ('$user_name','$password')";
      $query ="select * from user where email = '$email' limit 1 ";
      $result = mysqli_query($conn , $query);
      
      if($result){
        
          if($result && mysqli_num_rows($result)> 0 )
          {
            $user_data = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $user_data["password"]))
            {
            //if success
               $_SESSION['user_id']= $user_data['user_id'];
                header("location:addjob.php");
                die;
            }
        }
      }
      echo"please enter a valid username or password or signup first!";
   }else{
    echo"please enter a valid username or password!";
   }
}


?>

<img id="img1" src="./img/logo.jpeg" class="w-25 mb-3 mt-5" alt="" style="border-radius: 30px;">
    <h2>Jobcool</h2> <br><br>

    <p style="font-family: Georgia, 'Times New Roman', Times, serif;" class="lead text-center">Login</p><br>

<form method="post">
    <div class="mb-3">
        <label  class="form-label" for="email">Email:</label><br>
        <input id="text" class="form-control" type="email" name="email"><br>
        <label class="form-label" for="password">Password:</label><br>
        <input id="text" class="form-control" type="password" name="password"><br>
    </div>

    <div class= "mb-3">
        <input id="button" type="submit" name="submit" value="Send" class="btn btn-success w-100">
      </div>
</form> 

<a href="signup.php">Signup</a>




<?php include 'inc/footer.php'; ?>



   





