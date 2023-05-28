<?php include 'inc/header.php'; ?>

<?php
// Set vars to empty values
$position = $company = $description = $salary = '';
$positionErr = $companylErr = $descriptionErr = $salaryErr = '';
$allowed_ext = array('png', 'jpg', 'jpeg', 'gif');

// Form submit
if (isset($_POST['submit'])) {
  // Validate name
  if (empty($_POST['position'])) {
    $positionErr = 'Position is required';
  } else {
   
    $position = filter_input(
      INPUT_POST,
      'position',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }

  // Validate company name
  if (empty($_POST['company'])) {
    $companyErr = 'Company Name is required';
  } else {
    
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_SPECIAL_CHARS);
  } 

  if(!empty($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name'];
    $file_size = $_FILES['upload']['size'];
    $file_tmp = $_FILES['upload']['tmp_name'];
    $target_dir = "img/${file_name}";

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    if(in_array($file_ext, $allowed_ext)){

      if($file_size <= 1000000) {
        move_uploaded_file($file_tmp, $target_dir);
        echo '<p style="color:green;">File upload!</p>';
      } else{
          echo '<p style="color: red;">File too large! </p>';
      }
    }else{
      $message = '<p style="color: red;">Invalid file name! </p>';
    }

  }else{
    $message = '<p style="color:red;">Please choose a file!</p>';
  }

  if (empty($_POST['salary'])) {
    $salaryErr = 'Salary required';
  } else {
   
    $salary = (int)filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_SPECIAL_CHARS);
    
  }

  // Validate body
  if (empty($_POST['description'])) {
    $descriptionErr = 'Description is required';
    
  } else {
    $description = filter_input(
      INPUT_POST,
      'description',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    
  }

  if (empty($positionErr) && empty($companyErr) && empty($salaryErr) && empty($descriptionErr)) {
    // add to database
    // $sql = "INSERT INTO jobcool (position, company, ) VALUES ('$position', '$company', '$salary', $description')";
    $sql = "INSERT INTO job (position, company, file_name, salary, description) VALUES ('$position' , '$company', '$file_name', '$salary', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      // success
      header('Location:job.php');
    } else {
      // error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}
?>

    <h2>Jobcool</h2>
   
    <p class="lead text-center">Create a job here</p>

    <form method="POST" enctype="multipart/form-data" class="mt-4 w-75">
      <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <input type="text" class="form-control <?php echo !$positionErr ?:
          'is-invalid'; ?>" id="position" name="position" placeholder="Enter the position" value="<?php echo $position; ?>">
        <div id="validationServerFeedback" class="invalid-feedback">
          Please insert the position
        </div>
      </div>
      <div class="mb-3">
        <label for="company" class="form-label">Company</label>
        <input type="text" class="form-control <?php echo !$companyErr ?:
          'is-invalid'; ?>" id="company" name="company" placeholder="Enter the company name" value="<?php echo $company; ?>">
            <div id="validationServerFeedback" class="invalid-feedback">
          Please insert company name.
        </div>
      </div> 

        <div class="mb-3">
          <?php echo $message ?? null; ?>
          <label for="logo">Logo</label><br><br>
          <input id='logo' type="file" name="upload">
        </div>
          
      <div class = "mb-3">
        <label for = "salary" class = "form-label ">Salary</label>
        <input type="number" class="form-control <?php echo !$salaryErr ?:
          'is-invalid'; ?>" id="salary" name="salary" placeholder="Enter the salary" value="<?php echo $salary; ?>">
          <div id="validationServerFeedback" class="invalid-feedback">
          Please insert salary
        </div>
      </div>
      <div class="mb-3">
        <label for="des" class="form-label">Description</label>
        <textarea class="form-control <?php echo !$descriptionErr ?:
          'is-invalid'; ?>" id="description" name="description" placeholder="Enter your description"><?php echo $description; ?></textarea>
            <div id="validationServerFeedback" class="invalid-feedback">
            Please insert description
          </div>
      </div> <br> <br>
      <div class= "mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-success w-100">
      </div>
    </form>
<?php include 'inc/footer.php'; ?>


<!-- <h2>Rounded Image</h2>

<p>Use the border-radius property to create rounded images:</p>

<img src="paris.jpg" alt="Paris" width="300" height="300"> -->

</body>
</html>