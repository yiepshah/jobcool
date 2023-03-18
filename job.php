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
       <?php echo $item['position']; ?> / RM
       <?php echo $item['salary']; ?>
       <div class="text-secondary mt-2"> <?php echo $item[
         'description'
       ]; ?> <br>
        <?php echo date_format(
        date_create($item['date']),
        'g:ia \o\n l jS F Y'
      ); ?></div>
      <form method="POST" action="<?php echo htmlspecialchars(
          $_SERVER['PHP_SELF']
        ); ?>">
        <input type="hidden" name="id" value=<?php echo $item['id'];?>>
         <input type="submit" name="submit" value="Delete" class="btn btn-danger mt-2">
      </form>
      
      </div>
    </div>
  <?php endforeach; ?>
<?php include 'inc/footer.php'; ?>
