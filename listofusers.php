<?php include 'inc/header.php';

$sql = 'SELECT * FROM user';
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


  <?php foreach ($user as $item): ?>
    <div class="card my-5 mx-auto d-block bg-light" style="width: 500px;">
      <div class=" card-body">
        <?php if (empty($item['file_photo'])):?>
          <p>No Picture</p>
        <?php else: ?>
          <img class="mx-auto d-block mb-3" style="width: 304px;;height: 236px;px;object-fit:cover" src=<?php echo "./profile/image/" . $item['file_photo']; ?> alt="">
        <?php endif;?>
        <h4>Name: <?php echo $item['name']; ?></h4>
        <form action="userdetails.php" method="post">
          <input type="hidden" name="id" value=<?php echo $item['id'];?>>
          <input type="submit" name="submit" value="Detail" class="btn btn-secondary">
        </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php include 'inc/footer.php'; ?>

