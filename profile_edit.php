<?php
 include 'inc/header.php';
 $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');
 $allowed_ext_resume = array('docx', 'pdf');
 $message = '';
 $userid =  $_SESSION['user_id'];//2310
 if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    

    if(!empty($_FILES['photo']['name'])) {
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $target_dir = "profile/image/${file_name}";
    
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
    
        if(in_array($file_ext, $allowed_ext)){
    
          if($file_size <= 1000000) {
            move_uploaded_file($file_tmp, $target_dir);
            echo '<p style="color:green;">File upload!</p>';
            $sql = "UPDATE user SET  file_photo = '$file_name' WHERE user_id = '$userid'";
            $photoresult = mysqli_query($conn, $sql);
          } else{
              echo '<p style="color: red;">File too large! </p>';
          }
        }else{
          $message = '<p style="color: red;">Invalid file name! </p>';
        }
    
    }

    if(!empty($_FILES['resume']['name'])) {
        $resume_name = $_FILES['resume']['name'];
        $resume_size = $_FILES['resume']['size'];
        $resume_tmp = $_FILES['resume']['tmp_name'];
        $target_dir = "profile/resume/${resume_name}";
    
        $resume_ext = explode('.', $resume_name);
        $resume_ext = strtolower(end($resume_ext));
    
        if(in_array($resume_ext, $allowed_ext_resume)){
    
          if($resume_size <= 1000000) {
            move_uploaded_file($resume_tmp, $target_dir);
            echo '<p style="color:green;">File upload!</p>';
            $sql = "UPDATE user SET  file_resume = '$resume_name' WHERE user_id = '$userid'";
            $resumeresult = mysqli_query($conn, $sql);
          } else{
              echo '<p style="color: red;">File too large! </p>';
          }
        }else{
          $message = '<p style="color: red;">Invalid file name! </p>';
        }
    
    }


    $sql = "UPDATE user SET name = '$name' , email = '$email' WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $sql);


    if ($message == '') {
        // success
        header('Location:profile.php');
      } else {
        // error
        echo 'Error: ' . mysqli_error($conn);
        echo $message;
      }

 }


$sql = "SELECT * FROM user WHERE user_id = '$userid'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Edit Profile</h4>
    <div class="container w-50">
        <form method="POST" enctype="multipart/form-data" >
        <div class="mb-3">
            <div>
                <img style="width:100%;height:300px;object-fit:cover" src=<?php echo "./profile/image/" . $user['file_photo']; ?> alt="" ><br><br>
                <input type="file"name='photo'><br><br>
                <label class="form-label" for="name">Name:</label><br>
                <input id="name" class="form-control" type="text" name="name" value=<?php echo $user['name'];?>><br>
                <label class="form-label" for="email">Email:</label><br>
                <input id="email" class="form-control" type="email" name="email" value=<?php echo $user['email'];?>><br>
                <label for="">Resume:</label>
                <input type="file" name="resume"><br><br>
                <input type="submit" name="submit" class="btn btn-primary">
                
            </div>
        </div>
        </form>
    </div>

</body>
</html>

