<?php include './config/database.php'; ?>
<?Php   
session_start();
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //SOMETHING WAS POSTED
       $user_name = $_POST['user_name'];
       $password =  $_POST['password'];

       if(!empty ($user_name)&& !empty($password)&& !is_numeric($user_name))
       {
        //save to database
        $user_id = random_num(20);
        $query = "insert into login(user_id,user_name,password) values('$user_id','$user_name','$password')";

        mysqli_query($conn, $query);

        header("location:login.php");
        die;
       }else{
         echo "please entert a valid username!";
       }
    }

?>


   

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Signup</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-success mb-4">
      <a class="navbar-brand text-light" style="margin-left: 3%;">Jobcool</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-light">Add Job</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light">Past Job</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light">About</a>
          </li>
        </ul>
      </div>
</nav>

<main>
  <div class="container d-flex flex-column align-items-center">

<//img id="img1" src="./img/logo.jpeg" class="w-25 mb-3 mt-5" alt="" style="border-radius: 30px;">

    <h2>Jobcool</h2> <br><br>

    <p style="font-family: Georgia, 'Times New Roman', Times, serif;" class="lead text-center">Signup Here!</p><br>

<form method="post"> 
    <div class="mb-3">
        <label class="form-label" for="username">Username:</label><br>
        <input class="form-control" type=" text" name="user_name"><br>
        <label class="form-label" for="password">Password:</label><br>
        <input class="form-control" type="password" name="password"><br>
    </div>

    <div class= "mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-success w-100">
      </div>
</form> 

<a href="login.php">Login</a>





<?php include 'inc/footer.php'; ?>



