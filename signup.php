<?php   
include 'inc/header.php';
include("function.php");

$allowed_ext_resume = array('docx', 'pdf');
$allowed_ext_image = array('png', 'jpg', 'jpeg', 'gif');

if(isset($_POST['submit']))
{
    //SOMETHING WAS POSTED
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $cpassword = $_POST['cpassword']; 

    $emailErr = $namelErr = $passwordErr = $cpasswordErr = '';

    if(empty($password)){
      $passwordErr = 'Password is required';
    }
    if(empty($cpassword)){
      $cpasswordErr = 'Confirm Password is required';
    } 

    if($password !== $cpassword){
      echo 'password do not match';
    }
    if (empty($_POST['name'])) {
      $nameErr = 'name is required';
    } 
    if (empty($_POST['email'])) {
      $emailErr = 'email is required';
    } 


    if(!empty ($email)&& !empty($password)&&!empty($cpassword) &&!empty($name))
    {
    //save to database
    $user_id = random_num(20);
    $query = "insert into user(user_id,name,email,password) values('$user_id','$name','$email','$password')";


    try{
      mysqli_query($conn, $query);
    }catch(Exception $e){
      
      echo "An error happens";
    }finally{
      header("location:login.php");
    }
    
    die;
    }else{
      echo "please enter a valid form";
    }
    
    }

?>

    <h2>Jobcool</h2> <br><br>

    <p style="font-family: Georgia, 'Times New Roman', Times, serif;" class="lead text-center">Signup Here!</p><br>

    <form method="post" action="send.php" enctype="multipart/form-data"> 
        <div class="mb-3">
          <div>
            <label class="form-label" for="name">Name:</label><br>
            <input class="form-control <?php echo !$nameErr ?:
              'is-invalid'; ?>" type="text" name="name"><br>
          </div>

          <div>
            <label class="form-label" for="email">Email:</label><br>
            <input class="form-control <?php echo !$emailErr ?:
              'is-invalid'; ?>" type="email" name="email"><br>
          </div>
          <div>
            <label class="form-label" for="password">Password:</label><br>
            <input class="form-control <?php echo !$passwordErr ?:
              'is-invalid'; ?>" type="password" name="password"><br>
          </div>
          <div>
            <label class="form-label" for="cpassword">Confirm Password:</label><br>
            <input class="form-control <?php echo !$cpasswordErr ?:
              'is-invalid'; ?>" type="password" name="cpassword"><br>
          </div>
            <!-- <div class="mb-3">
              <label for="resume">Resume:</label><br><br>
              <input id='resume' type="file" name="resume"><br>
              <div class="mb-3">
              
            </div>
            <div class="mb-3">
              <label for="image">image:</label><br><br>
              <input id='image' type="file" name="image"><br>
              <div class="mb-3">
              
        </div> -->

        <div class= "mb-3">
            <input type="submit" name="submit" value="Send" class="btn btn-success w-100">
          </div>
    </form> 

<a href="login.php">Login</a>




<?php include 'inc/footer.php'; ?>




