<?php include 'inc/header.php'; ?>

<?php
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $sql = "SELECT * FROM job WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $job = mysqli_fetch_assoc($result);
}
?>
<div class="card my-3 w-75">
     <div class="card-body ">
       <label style="font-family: Georgia, 'Times New Roman', Times, serif;" for="">Company Logo:</label><img style="height: 100px;" src=<?php echo "./img/" . $job['file_name']; ?> alt="" ><br><hr>
       <label style="font-family: Georgia, 'Times New Roman', Times, serif;" for="">Job Position:</label> <?php echo $job['position']; ?><hr>
       <label style="font-family: Georgia, 'Times New Roman', Times, serif;" for="">Salary: Rm</label> <?php echo $job['salary']; ?><hr>
       <label style="font-family: Georgia, 'Times New Roman', Times, serif;" for="">Company Name:</label> <?php echo $job['company']; ?><hr>
       <label style="font-family: Georgia, 'Times New Roman', Times, serif;" for="">Requirement:</label> <div class="mt-2"> <?php echo $job[
         'description'
       ];?><hr>
        <label style="font-family: Georgia, 'Times New Roman', Times, serif;" for="" for="">Date:</label> <?php echo date_format(
        date_create($job['date']),
        'g:ia \o\n l jS F Y'
      ); ?></div>
      
      
      </div>
    </div>

      <?php include 'inc/footer.php'; ?>
