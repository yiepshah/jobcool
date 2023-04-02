
<?php   
include 'inc/header.php';
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //SOMETHING WAS POSTED
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if(!empty ($email)&& !empty($password))
    {
    //save to database
    $user_id = random_num(20);
    $query = "insert into user(user_id,email,password) values('$user_id','$email','$password')";

    mysqli_query($conn, $query);

    header("location:login.php");
    die;
    }else{
      echo "please enter a valid email & password!";
    }
}

?>

    <h2>Jobcool</h2> <br><br>

    <p style="font-family: Georgia, 'Times New Roman', Times, serif;" class="lead text-center">Signup Here!</p><br>

<form method="post"> 
    <div class="mb-3">
        <label class="form-label" for="email">Email:</label><br>
        <input class="form-control" type="email" name="email"><br>
        <label class="form-label" for="password">Password:</label><br>
        <input class="form-control" type="password" name="password"><br>
    </div>

    <div class= "mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-success w-100">
      </div>
</form> 

<a href="login.php">Login</a>





<?php include 'inc/footer.php'; ?>




