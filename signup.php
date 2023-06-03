<?php   
include 'inc/header.php';
include("function.php");


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

        <div class= "mb-3">
            <input type="submit" name="submit" value="Send" class="btn btn-success w-100">
          </div>
    </form> 

<a href="login.php">Login</a>




<?php include 'inc/footer.php'; ?>




