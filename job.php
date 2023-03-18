<?php include 'inc/header.php'; ?>

<?php
$sql = 'SELECT * FROM job';
$result = mysqli_query($conn, $sql);
$jobcool = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

   
  <h2 class="text-white">Past Job</h2>

  <?php if (empty($jobcool)): ?>
    <p class="lead mt-3">There is no job</p>
  <?php endif; ?>

  <?php foreach ($jobcool as $item): ?>
    <div class="card my-3 w-75">
     <div class="card-body text-center">
       <?php echo $item['position']; ?> / RM
       <?php echo $item['salary']; ?>
       <div class="text-secondary mt-2"> <?php echo $item[
         'description'
       ]; ?> <?php echo date_format(
   date_create($item['date']),
   'g:ia \o\n l jS F Y'
 ); ?></div>
     </div>
   </div>
  <?php endforeach; ?>
<?php include 'inc/footer.php'; ?>
