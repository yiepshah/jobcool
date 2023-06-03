<?php include 'inc/header.php'; ?>

<?php

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $deletesql = "DELETE FROM job WHERE id='$id'";
  $sdeleteresult = mysqli_query($conn, $deletesql);
  
  header('Location:job.php');
  
}
$sql = 'SELECT * FROM job';
$result = mysqli_query($conn, $sql);
$job = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

   
  <h2>Past Job</h2>

  <?php if (empty($job)): ?>
    <p class="lead mt-3">There is no job</p>
  <?php endif; ?>

  <?php foreach ($job as $item): ?>
    <div class="card my-3 w-75">
     <div class="card-body text-center">
       <img style="height: 100px;" src=<?php echo "./img/" . $item['file_name']; ?> alt="" ><br><br>
       <h4><?php echo $item['position']; ?></h4>
      <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button><br><br>
      <form action="detailjobs.php" method="POST">
        <input type="hidden" name="id" value=<?php echo $item['id'];?>>
        <input type="submit" name="submit" value="Detail" class="btn btn-secondary">
      </form>
      
      </div>
    </div>
  <?php endforeach; ?>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure want to delete this?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form method="POST" action="<?php echo htmlspecialchars(
          $_SERVER['PHP_SELF']
        ); ?>">
        <input type="hidden" name="id" value=<?php echo $item['id'];?>>
         <input type="submit" name="submit" value="Delete" class="btn btn-danger">
      </form>
        </div>
      </div>
    </div>
  </div>
<?php include 'inc/footer.php'; ?>
