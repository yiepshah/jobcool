<?php include 'inc/header.php'; ?>
<h2>Profile</h2>

<?php


$userid =  $_SESSION['user_id'];//2310
$sql = "SELECT * FROM user WHERE user_id = '$userid'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>


<?php if (empty($user)): ?>
    <p class="lead mt-3">No profile</p>
  <?php endif; ?>

  
    <div class="card my-3 w-75 bg-light" >
      <div class="card-body text-fluit">
        <img style="width:100%;height:300px;object-fit:cover" src=<?php echo "./profile/image/" . $user['file_photo']; ?> alt="" ><br><hr>
          
          Name: <?php echo $user['name']; ?><br><hr>
          Email: <?php echo $user['email']; ?> <br><hr>
          <!-- Resume: <img style="height: 100px; width:50%" class="card-img-bottom" src=<?php echo "./image/" . $item['file_resume']; ?> alt="" ><br><hr> -->
          <?php echo date_format(
          date_create($user['date']),
          'g:ia \o\n l jS F Y'
        ); ?><hr>
        Resume:
        <iframe width="500px" src=<?php echo "./profile/resume/". $user['file_resume'];?> frameborder="0"></iframe><br><br>
        
        <a class="btn btn-primary" href="profile_edit.php">Edit Profile</a>

      
      <!-- <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Delete
      </button> -->
      
      
    </div>
  
  




























<?php include 'inc/footer.php'; ?>