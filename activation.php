<?php

use function PHPSTORM_META\sql_injection_subst;

include 'inc/header.php'; 
include("function.php");
if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $code = $_POST['code'];
    

    $sql = "select * from invitation where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $invitation = mysqli_fetch_assoc($result);
    $name = $invitation['name'];
    $password = $invitation['password'];
    $deletemail=$invitation['email'];

    if($email==$invitation['email']&& $code==$invitation['code']){
        $user_id = random_num(10);
        $query = "insert into user(user_id,name,email,password) values('$user_id','$name','$email','$password')";
        $deletequery = "DELETE FROM invitation WHERE email='$deletemail'";
        try{
            mysqli_query($conn, $query);
            mysqli_query($conn, $deletequery);
          }catch(Exception $e){
            echo "An error happens";
          }finally{
            header("location:login.php");
          }
    }else{
        echo 'wrong';
    }

}

?>
<h2>Activation</h2> <br><br>

<p style="font-family: Georgia, 'Times New Roman', Times, serif;" class="lead text-center">Signup Here!</p><br>

<form method="post"> 
    <div class="mb-3">
      <div>
        <label class="form-label" for="email">Email:</label><br>
        <input class="form-control" type="email" name="email"><br>
      </div>
      <div>
        <label class="form-label" for="code">Activation code:</label><br>
        <input class="form-control" type="text" name="code"><br>
      </div>
    <div class= "mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-success w-100">
      </div>
</form> 