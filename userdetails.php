<?php include 'inc/header.php'; ?>  

<?php
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $sql = "SELECT * FROM user WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);
}
?>

  <div class="card my-5 w-75 mx-auto d-block bg-light">
    <div class=" card-body">
    <?php if (empty($user['file_photo'])):?>
        <p>No Photo</p>
        <?php else: ?>
          <img class="mx-auto d-block mb-3" style="width: 304px;;height: 236px;px;object-fit:cover" src=<?php echo "./profile/image/" . $user['file_photo']; ?> alt="" ><hr>
        <?php endif;?>
     <label style="font-family: Georgia, 'Times New Roman', Times, serif;" for="name">Name:</label> <p><?php echo $user['name']; ?></p> <br><hr>
      <label style="font-family: Georgia, 'Times New Roman', Times, serif;" for="email">Email:</label> <p><?php echo $user['email']; ?></p> <br><hr>
      <?php if (empty($user['file_resume'])):?>
        <p>No Resume</p>
        <?php else: ?>
          Resume:
          <iframe class="mx-auto d-block" width="50%" src=<?php echo "./profile/resume/". $user['file_resume'];?> frameborder="0"></iframe>
        <?php endif;?>
        </div>
      </div>
    </div>

  <?php include 'inc/footer.php'; ?>